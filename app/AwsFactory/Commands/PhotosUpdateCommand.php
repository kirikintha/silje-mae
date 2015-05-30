<?php

/**
 * @file RunQueueCommand.php
 *  This is to run queues that have been created.
 */

namespace AwsFactory\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Helper\ProgressBar;
use Illuminate\Support\Facades\File;
use AwsFactory\Clients\AwsS3ClientInterface;

class PhotosUpdateCommand extends Command {

    private $access_key;
    private $secret;
    private $menus;
    private $thumbnails;
    private $s3;
    private $tmp = '/tmp';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'photos:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update photos from S3.';

    public function __construct(AwsS3ClientInterface $s3) {
        parent::__construct();
        $this->s3 = $s3;
        $this->access_key = \Config::get('app.access_key');
        $this->secret = \Config::get('app.secret');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire() {
        //Start Queue.
        $this->info(sprintf('Loading: %s', \App::environment()));
        $this->info('Starting photo update.');
        $this->photoUpdate();
        $this->info('Finished running photo update.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments() {
        return array();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions() {
        return array();
    }

    private function photoUpdate() {
        //Just make the API here, no need to get fancy.
        $this->s3->request = array(
            'access_key' => \Crypt::encrypt($this->access_key),
            'secret' => \Crypt::encrypt($this->secret),
            'region' => \Aws\Common\Enum\Region::US_EAST_1,
            'bucket' => 'silje-mae',
            'prefix' => 'master',
        );
        $this->s3->testConnection();
        if ($this->s3->response['connected'] === true) {
            //Show how many records we imported.
            $this->s3->listObjects();
            //Tell us how many photos we found.
            $this->info(sprintf('Found %d photos in this bucket', $this->s3->count));
            if ($this->s3->count > 0) {
                $progress = new ProgressBar($this->output, $this->s3->count);
                $progress->setFormat(' %current%/%max% [%bar%] %percent:3s%% %elapsed:6s%/%estimated:-6s% %memory:6s%');
                $progress->start();
                $i = 0;
                while ($i++ < $this->s3->count) {
                    $object = $this->s3->objects->current();
                    $this->s3->objects->next();
                    if (!empty($object)) {
                        //Look for a menu item.
//                        $this->setMenuItem($object['Key']);
                        //Look for images, and create thumbnails.
                        $this->createImages($object);
                    }
                    // advance the progress bar 1 unit.
                    $progress->advance();
                    unset($object);
                }
            }
            //Kill all caches, so they run on the next page load.
            \Cache::forget('thumbnails');
            //Finish.
            $progress->finish();
            //Show how many records we imported.
            $this->info(sprintf("\nFinished importing %d photos", $this->s3->total));
        }
    }

    //Set thumbnail.
    private function createImages($object) {
        $key = $object['Key'];
        $size = $object['Size'];
        if (preg_match('/\.(jpg|jpeg|bpm|png|gif)$/i', $key) && (int) $size > 0) {
            $extension = File::extension($key);
            $file_name = str_replace('"', '', $object['ETag']) . '.' . $extension;
            //Check that object exists or not.
            $exists = $this->exists($file_name);
            if (!$exists) {
                //Make images.
                $this->makeImages($key, $file_name);
            }
        }
    }

    //Check that an object exists.
    private function exists($file_name) {
        $key = 'thumbnails/' . $file_name;
        return $this->s3->objectExists($this->s3->request['bucket'], $key);
    }

    //Download and make images.
    private function makeImages($key, $file_name) {
        $uri = $this->download($key, $file_name);
        $this->makeThumbnail($uri, $file_name);
        $this->makeFull($uri, $file_name);
        //Delete original File.
        \File::delete($uri);
        //Add to total of imported items.
        $this->s3->total ++;
    }

    //Download Object.
    private function download($key, $file_name) {
        //Get the object, 
        $saveAs = $this->tmp . '/master-' . $file_name;
        $result = $this->s3->getObject(array(
            'Bucket' => $this->s3->request['bucket'],
            'Key' => $key,
            'SaveAs' => $saveAs,
        ));
        return $result['Body']->getUri();
    }

    //Creat Thumnail
    //I have found it saves memory, to run each image operation separately,
    // and destroy it, as the vendor stuff does not handle chaining very well.
    // Strangely, it's better to make new images everytime, rather than chain.
    private function makeThumbnail($uri, $file_name) {
        $key = sprintf('thumbnails/%s', $file_name);
        $this->makeImageFit($key, $uri, $file_name, 242, 200);
    }
    
    //Make a full sized image.
    private function makeFull($uri, $file_name) {
        $key = sprintf('full/%s', $file_name);
        $this->makeImageFit($key, $uri, $file_name, 726, 600);
    }

    //Make image fit to a certain size.
    private function makeImageFit($key, $uri, $file_name, $w = 242, $h = 200) {
        $saveAs = $this->tmp . '/' . $file_name;
        $img = \Image::make($uri)->orientate();
        $img->fit($w, $h, function ($constraint) {
            $constraint->upsize();
        }, 'top');
        $img->save($saveAs, 80);
        $img->destroy();
        //Send File back up to S3.
        $this->s3->put(array(
            'Bucket' => $this->s3->request['bucket'],
            'Key' => $key,
            'SourceFile' => $saveAs
        ));
        //Delete temp File.
        File::delete($saveAs);
    }

    //Cache thumbnails, into their directory structure.
    //@TODO - we are moving this over to the photo controller, so that
    // We pull the latest directory info and cache it. This will stop us from 
    // having to re-load this, and get new info on the fly.
    private function cacheThumbnails($key, $extension, $file_name) {
        //Add To Tumbnails array.
        $notated = str_replace('/', '.', rtrim($key, '.' . $extension));
        $this->thumbnails = \Cache::get('thumbnails', array());
        array_set($this->thumbnails, $notated, array(
            'key' => $key,
            'file_name' => $file_name
        ));
        \Cache::forever('thumbnails', $this->thumbnails);
        unset($this->thumbnails, $notated, $key, $extension, $file_name);
    }

    //Set Menu Item.
    //@TODO - move this into the menu controller, and make an active connection to
    // AWS when needed.
    private function setMenuItem($key = null) {
        if (!preg_match('/\.(jpg|jpeg|bpm|mov|png|gif|mp4)$/i', $key)) {
            $notated = str_replace('/', '.children.', rtrim(ltrim($key, '/'), '/'));
            $this->menus = \Cache::get('menus', array());
            array_set($this->menus, $notated, array(
                'path' => rtrim($key, '/'),
                'name' => basename($key)
            ));
            unset($notated);

            \Cache::forget('menus');
            \Cache::forever('menus', $this->menus);
            unset($this->menus);
        }
    }

}
