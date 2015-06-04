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
    private $bucket;
    private $prefix;
    private $s3;
    private $tmp = '/tmp';
    private $caches = array(
        'thumbnails',
        'menus'
    );

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
        //Set ini for 256MB
        ini_set('memory_limit', '256M');
        //Set vars
        $this->s3 = $s3;
        //@TODO - let's move this back into the client.
        $this->access_key = \Config::get('app.access_key');
        $this->secret = \Config::get('app.secret');
        $this->bucket = \Config::get('app.bucket');
        $this->prefix = \Config::get('app.prefix');
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
            'bucket' => $this->bucket,
            'prefix' => $this->prefix,
        );
        $this->s3->testConnection();
        if ($this->s3->response['connected'] === true) {
            //Show how many records we imported.
            $this->s3->listObjects();
            //Tell us how many photos we found.
            $this->info(sprintf('Found %d photos in this bucket', $this->s3->count));
            //Update images.
            $this->update();
        }
    }

    //Update images.
    private function update() {
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
            //Finish.
            $progress->finish();
            //Show how many records we imported.
            $this->info(sprintf("\nFinished importing %d photos", $this->s3->total));
            //Post Update.
            $this->postUpdate();
        }
    }

    //Kill the cache, and re-prime the photos url.
    private function postUpdate() {
        $this->info('Import finished, cleaning up.');
        $this->killCache();
        $this->prime();
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
            unset($exists, $extension, $file_name);
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
        $uri = $result['Body']->getUri();
        unset($result);
        return $uri;
    }

    //Creat Thumnail
    //I have found it saves memory, to run each image operation separately,
    // and destroy it, as the vendor stuff does not handle chaining very well.
    // Strangely, it's better to make new images everytime, rather than chain.
    private function makeThumbnail($uri, $file_name) {
        $key = sprintf('thumbnails/%s', $file_name);
        $this->makeImageFit($key, $uri, $file_name, 242);
    }

    //Make a full sized image.
    private function makeFull($uri, $file_name) {
        $key = sprintf('full/%s', $file_name);
        $this->makeImageFit($key, $uri, $file_name, 726);
    }

    //Make image fit to a certain size.
    private function makeImageFit($key, $uri, $file_name, $w = 242) {
        $saveAs = $this->tmp . '/' . $file_name;
        $img = \Image::make($uri)->orientate();
        $img->resize($w, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($saveAs, 80);
        $img->destroy();
        //Send File back up to S3.
        $this->s3->put(array(
            'Bucket' => $this->s3->request['bucket'],
            'Key' => $key,
            'CacheControl' => 'max-age=172800',
            'SourceFile' => $saveAs,
        ));
        //Delete temp File.
        File::delete($saveAs);
        unset($img);
    }

    //Kill all caches.
    private function killCache() {
        $this->info('Killing Cache');
        //Kill all caches, so they run on the next page load.
        foreach ($this->caches as $cache) {
            \Cache::forget($cache);
        }
    }

    //Prime the cache.
    private function prime() {
        $url = \Config::get('app.url') . '/photos';
        $this->info(sprintf('Priming Cache on: ' . $url));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        curl_exec($curl);
        if (curl_errno($curl)) {
            $this->error(curl_error($curl));
        }
        curl_close($curl);
        $this->info('Cache prime complete.');
    }

}
