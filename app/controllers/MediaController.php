<?php

use AwsFactory\Clients\AwsS3ClientInterface;
use Illuminate\Support\Facades\File;

class MediaController extends Controller {

    private $media;
    private $access_key;
    private $secret;
    private $bucket;
    private $prefix;
    private $s3;

    public function __construct(AwsS3ClientInterface $s3) {
        //Set vars
        $this->s3 = $s3;
        //@TODO - let's move this back into the client.
        $this->access_key = \Config::get('app.access_key');
        $this->secret = \Config::get('app.secret');
        $this->bucket = \Config::get('app.bucket');
        $this->prefix = \Config::get('app.prefix');
    }

    /**
     * Display a listing of the resource.
     * GET /photo
     *
     * @return Response
     */
    public function index() {
        if (Cache::has('media')) {
            $this->media = Cache::get('media');
        } else {
            $this->getThumbnails();
        }
        return $this->response();
    }

    //Get all photos from S3.
    private function getThumbnails() {
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
            $this->s3->listObjects();
            $i = 0;
            while ($i++ < $this->s3->count) {
                $object = $this->s3->objects->current();
                $this->s3->objects->next();
                if (!empty($object) && (int) $object['Size'] > 0) {
                    //Look for a menu item.
                    $key = $object['Key'];
                    $extension = File::extension($key);
                    $file_name = str_replace('"', '', $object['ETag']) . '.' . $extension;
                    $this->setMedia($key, $extension, $file_name);
                }
                unset($object);
            }
        }
        //Cache me.
        \Cache::forever('media', $this->media);
    }

    //Cache media, into their directory structure.
    private function setMedia($key, $extension, $file_name) {
        if (preg_match('/\.(jpg|jpeg|bpm|png|gif|mov|mp4)$/i', $key)) {
            //Add To Tumbnails array.
            $key = str_replace($this->prefix, '', $key);
            $notated = str_replace('/', '.', rtrim($key, '.' . $extension));
            if (!empty($notated)) {
                array_set($this->media, ltrim($notated, '.'), array(
                    'key' => $key,
                    'file_name' => $file_name
                ));
            }
        }
    }

    //Get all the items we have, and normalize them.
    private function response() {
        //Look for a path, that we can pull from.
        $path = Request::path();
        $path = str_replace('/', '.', ltrim(urldecode($path), 'api/media/'));
        $items = array_get($this->media, $path);
        if (!empty($path) && !strstr($path, '.')) {
            //We are getting all the folders, return a random item.
            //This does not have proper depth in it yet.
            foreach ($items as $key => $item) {
                $rand = array_rand($item);
                $items[$key] = array(
                    'path' => $path . '/' . $key,
                    'title' => rtrim($key, '/'),
                    'file_name' => $item[$rand]['file_name'],
                );
            }
        }
        //If we are on /api/media then show all first level items.
        if (empty($path)) {
            $items = array();
            foreach ($this->media as $key => $item) {
                $rand = array_rand($item);
                $child = array_rand($item[$rand]);
                $items[$key] = array(
                    'path' => $path . $key,
                    'title' => ltrim(rtrim($key, '/'), '/'),
                    'file_name' => $item[$rand][$child]['file_name'],
                );
            }
        }
        return Response::json(array_values($items));
    }

}
