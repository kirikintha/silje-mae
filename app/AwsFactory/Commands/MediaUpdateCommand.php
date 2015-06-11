<?php

/**
 * @file RunQueueCommand.php
 *  This is to run queues that have been created.
 * @TODO - create video posters, and upload to "posters" we'll let the video
 *  player take over. We also need thumbnails and fulls too. Just make em all.
 * @TODO - Make sure that the layouts understand when to make a videoplayer and when not to.
 * @TODO - when we have a media item that it constructs the proper videoSettings array.
 */

namespace AwsFactory\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Helper\ProgressBar;
use Illuminate\Support\Facades\File;
use AwsFactory\Clients\AwsS3ClientInterface;

class MediaUpdateCommand extends Command {

    private $access_key;
    private $secret;
    private $bucket;
    private $prefix;
    private $s3;
    private $tmp = '/tmp';
    private $caches = array(
        'media',
        'menus',
    );
    private $video;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'media:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update media from S3.';

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
        $this->info('Starting media update.');
        $this->mediaUpdate();
        $this->info('Finished running media update.');
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

    private function mediaUpdate() {
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
            //Tell us how many media items we found.
            $this->info(sprintf('Found %d media items in this bucket', $this->s3->count));
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
                    //Look for images, and create thumbnails.
                    $this->create($object);
                }
                // advance the progress bar 1 unit.
                $progress->advance();
                unset($object);
            }
            //Finish.
            $progress->finish();
            //Show how many records we imported.
            $this->info(sprintf("\nFinished importing %d media items", $this->s3->total));
            //Post Update.
            $this->postUpdate();
        }
    }

    //Kill the cache, and re-prime the media url.
    private function postUpdate() {
        $this->info('Import finished, cleaning up.');
        $this->killCache();
        $this->prime('menus');
        $this->prime('media');
    }

    //Set thumbnail.
    private function create($object) {
        $key = $object['Key'];
        $size = $object['Size'];
        $eTag = $object['ETag'];
        if ((int) $size > 0) {
            //Look for images.
            if (preg_match('/\.(jpg|jpeg|bpm|png|gif)$/i', $key)) {
                $this->createImages($key, $eTag);
            }
            //Look for 
            if (preg_match('/\.(mov|mp4)$/i', $key)) {
                $this->createVideos($key, $eTag);
            }
        }
    }

    //Create images.
    private function createImages($key, $eTag) {
        $extension = File::extension($key);
        $file_name = str_replace('"', '', $eTag) . '.' . $extension;
        //Check that object exists or not.
        $exists = $this->imageExists($file_name);
        if (!$exists) {
            //Make images.
            $this->makeImages($key, $file_name);
        }
        unset($exists, $extension, $file_name);
    }

    //Check that an image object exists.
    private function imageExists($file_name) {
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

    //Create videos.
    //@TODO - sloppy.
    private function createVideos($key, $eTag) {
        $extension = File::extension($key);
        $file_name = str_replace('"', '', $eTag) . '.' . $extension;
        //Check that object exists or not.
        $exists = $this->videoExists($file_name, $extension);
        if (!$exists) {
            //Make videos.
            //Reset array.
            $this->video = array(
                'info' => array(),
                'in' => null,
                'out' => null,
                'created' => array(),
            );
            $this->makeVideos($key, $file_name, $extension);
        }
        unset($exists, $extension, $file_name);
    }

    //Check that an image object exists.
    private function videoExists($file_name, $extension) {
        $key = 'videos/' . str_replace($extension, 'mp4', $file_name);
        return $this->s3->objectExists($this->s3->request['bucket'], $key);
    }

    //Download and re-encode videos.
    //@TODO - this is messy.
    private function makeVideos($key, $file_name, $extension) {
        $uri = $this->download($key, $file_name);
        $this->probe($uri);
        $this->makeMP4($uri, $file_name, $extension);
        $this->makeFLV($file_name, $extension);
        $this->finish($uri);
        //Add to total of imported items.
        $this->s3->total ++;
    }

    //FFMPEG Probe
    //To get rotation, look for video -> tags -> rotate
    private function probe($uri) {
        $command = sprintf('ffprobe -of json -show_streams %s 2>/dev/null', $uri);
        exec($command, $output);
        $json = utf8_encode(implode('', $output));
        $probe = json_decode($json, true);
        $this->video['info'] = array(
            'video' => $probe['streams'][0],
            'audio' => $probe['streams'][1],
        );
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

    //Fix orientation and create FLV.
    //http://nothing.golddave.com/2013/11/28/fix-smartphone-video-orientation/
    private function makeMP4($uri, $file_name, $extension) {
        $this->video['in'] = $uri;
        $this->video['out'] = $this->tmp . '/' . str_replace($extension, 'mp4', $file_name);
        //Look for Rotation and rotate.
        $this->rotate();
        //Resize Video
        $command = sprintf('ffmpeg -y -i %s -vf "scale=640:-1" -acodec copy -movflags faststart %s 2>/dev/null', $this->video['in'], $this->video['out']);
        //Scale video to mp4 and prep for streaming.
        exec($command);
        //Put the video back up to S3.
        $this->putVideo($this->video['out']);
        $this->video['created'][] = $this->video['out'];
        $this->video['in'] = $this->video['out'];
    }

    //Rotate Video
    private function rotate() {
        if (isset($this->video['video']['tags']['rotate'])) {
            $rotation = (int) $this->video['video']['tags']['rotate'];
            $rotated = str_replace('master', 'rotated', $this->video['in']);
            switch ($rotation) {
                //Default is 90 degrees.
                case 90:
                default:
                    $command = sprintf('ffmpeg -y -i %s -metadata:s:v rotate="0" -vf "transpose=1" -acodec copy %s 2>/dev/null', $this->video['in'], $rotated);
                    break;
            }
            //Rotate
            exec($command);
            //If we have rotated, we now have to update the in and out, so that the scaling picks up the rotated file.
            $this->video['created'][] = $rotated;
            $this->video['in'] = $rotated;
        }
    }

    //Make an FLV
    private function makeFLV($file_name, $extension) {
        //@TODO - we will have to take the MP4 version of the file, as this has
        // been rotated and scaled.
        //Make FLV
        $this->video['out'] = $this->tmp . '/' . str_replace($extension, 'flv', $file_name);
        //Exec FFMEG rotation.
        $command = sprintf('ffmpeg -y -i %s -c:v libx264 -crf 19 %s 2>/dev/null', $this->video['in'], $this->video['out']);
        exec($command);
        $this->video['created'][] = $this->video['out'];
        $this->putVideo($this->video['out']);
    }

    //Exec FFMPEG Command.
    private function finish($uri) {
        //Kill Created Files.
        foreach ($this->video['created'] as $file_name) {
            //Delete temp Files.
            File::delete($file_name);
        }
        //Kill original.
        \File::delete($uri);
    }

    //Put video to S3
    private function putVideo($file_name) {
        $bytes = File::size($file_name);
        if ($bytes > 0) {
            //Send the 
            $info = new \SplFileInfo($file_name);
            $key = sprintf('videos/%s', $info->getFilename());
            //Send File back up to S3.
            $options = array(
                'Bucket' => $this->s3->request['bucket'],
                'Key' => $key,
                'CacheControl' => 'max-age=172800',
                'SourceFile' => $file_name,
            );
            $this->s3->put($options);
        }
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
    private function prime($location = null) {
        $url = \Config::get('app.url') . '/api/' . $location;
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
    }

}
