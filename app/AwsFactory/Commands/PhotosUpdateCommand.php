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

    private $access_key = '';
    private $secret = '';
    private $menuItems = array();
    private $photoThumbnails = array();
    private $s3;

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
        \Cache::forget('photoMenuItems');
        \Cache::forget('photoThumbnails');
        //Just make the API here, no need to get fancy.
        $this->s3->request = array(
            'access_key' => \Crypt::encrypt($this->access_key),
            'secret' => \Crypt::encrypt($this->secret),
            'region' => \Aws\Common\Enum\Region::US_EAST_1,
            'bucket' => 'silje-mae',
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
                        $this->setMenuItem($object['Key']);
                        //Look for images, and create thumbnails.
                        $this->setThumbnail($object);
                    }
                    // advance the progress bar 1 unit.
                    $progress->advance();
                    unset($object);
                }
            }
            //Cache Items.
            \Cache::forever('photoMenuItems', $this->menuItems);
            \Cache::forever('photoThumbnails', $this->photoThumbnails);
            $progress->finish();
            //Show how many records we imported.
            $this->info(sprintf("\nFinished importing %d photos", $this->s3->total));
        }
    }

    //Set Menu Item.
    private function setMenuItem($key = null) {
        if (!preg_match('/\.(jpg|jpeg|bpm|mov|png|gif|mp4)$/i', $key)) {
            $notated = str_replace('/', '.children.', rtrim(ltrim($key, '/'), '/'));
            array_set($this->menuItems, $notated, array(
                'path' => rtrim($key, '/'),
                'name' => basename($key)
            ));
            unset($notated);
        }
    }

    //Set thumbnail.
    private function setThumbnail($object) {
        $key = $object['Key'];
        $size = $object['Size'];
        if (preg_match('/\.(jpg|jpeg|bpm|mov|png|gif|mp4)$/i', $key) && (int) $size > 0) {
            $extension = File::extension($key);
            $file_name = str_replace('"', '', $object['ETag']) . '.' . $extension;
            if (preg_match('/\.(mov|mp4)$/i', $key)) {
                //@TODO - make video item.
            } else {
                $dir = public_path() . '/files/thumbnails/';
                $greyscale = $dir . 'greyscale/';
                if (!File::exists($dir . $file_name)) {
                    $tmp = '/tmp/' . $file_name;
                    //Create image item.
                    $result = $this->s3->getObject(array(
                        'Bucket' => $this->s3->request['bucket'],
                        'Key' => $key,
                        'SaveAs' => $tmp
                    ));
                    $uri = $result['Body']->getUri();
                    //Make Thumbnails.
                    \Image::make($uri)
                            ->fit(242, 200)
                            ->save($dir . $file_name, 80);
                    if (!File::exists($greyscale . $file_name)) {
                        \Image::make($uri)
                                ->greyscale()
                                ->fit(242, 200)
                                ->save($greyscale . $file_name, 80);
                    }
                    //Delete tmp file.
                    File::delete($tmp);
                    $this->s3->total ++;
                    unset($result);
                }
                //Add To Tumbnails array.
                $notated = str_replace('/', '.', rtrim($key, '.' . $extension));
                array_set($this->photoThumbnails, $notated, array(
                    'key' => $key,
                    'file_name' => $file_name
                ));
            }
        }
        unset($key, $size, $extension, $file_name, $uri, $notated);
    }

}
