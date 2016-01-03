<?php

use AwsFactory\Clients\AwsS3ClientInterface;
use Illuminate\Support\Facades\File;

class MediaController extends Controller {

	private $media;
	private $access_key;
	private $secret;
	private $bucket;
	private $prefix;
	//Not sure if this is in the S3 service provider.
	private $url = 'https://s3.amazonaws.com';
	private $s3;

	public function __construct(AwsS3ClientInterface $s3) {
		//Set vars
		$this->s3 = $s3;
		//@TODO - let's move this back into the client.
		$this->access_key = \Config::get('app.access_key');
		$this->secret     = \Config::get('app.secret');
		$this->bucket     = \Config::get('app.bucket');
		$this->prefix     = \Config::get('app.prefix');
	}

	/**
	 * Display a listing of the resource.
	 * GET /photo
	 *
	 * @return Response
	 */
	public function index() {
		if (Input::get('forget')) {
			Cache::forget('media');
		}
		if (Cache::has('media')) {
			$this->media = Cache::get('media');
		} else {
			$this->getMedia();
		}
		return $this->response();
	}

	//Get all media from S3.
	private function getMedia() {
		//Just make the API here, no need to get fancy.
		$this->s3->request = array(
			'access_key' => \Crypt::encrypt($this->access_key),
			'secret'     => \Crypt::encrypt($this->secret),
			'region'     => \Aws\Common\Enum\Region::US_EAST_1,
			'bucket'     => $this->bucket,
			'prefix'     => $this->prefix,
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
					$key       = $object['Key'];
					$extension = File::extension($key);
					$file_name = str_replace('"', '', $object['ETag']) . '.' . $extension;
					$this->setMedia($key, $extension, $file_name);
				}
				unset($object);
			}
		}
		//Cache me.
		$expires = Carbon::now()->addMinutes(1440);
		\Cache::put('media', $this->media, $expires);
	}

	//Cache media, into their directory structure.
	private function setMedia($key, $extension, $file_name) {
		if (preg_match('/\.(jpg|jpeg|bpm|png|gif|mov|mp4)$/i', $key)) {
			$key     = str_replace($this->prefix, '', $key);
			$notated = str_replace('/', '.', rtrim($key, '.' . $extension));
			if (!empty($notated)) {
				$media = array(
					'key'       => $key,
					'file_name' => $file_name,
					'type'      => $this->getType($extension),
				);
				if ($media['type'] === 'video') {
					$base                   = pathinfo($file_name, PATHINFO_FILENAME);
					$media['videoSettings'] = array(
						'id'      => sprintf('video-%s', $base),
						'poster'  => sprintf('%s/%s/posters/%s.jpg', $this->url, $this->bucket, $base),
						'mp4'     => sprintf('%s/%s/videos/%s.mp4', $this->url, $this->bucket, $base),
						'flv'     => sprintf('%s/%s/videos/%s.flv', $this->url, $this->bucket, $base),
						'classes' => 'thumbnail',
					);
				}
				array_set($this->media, ltrim($notated, '.'), $media);
			}
		}
	}

	//Get the media type, image or video.
	private function getType($extension) {
		if (preg_match('/(mov|mp4)$/i', $extension)) {
			return 'video';
		}
		return 'image';
	}

	//Get all the items we have, and normalize them.
	private function response() {
		//Look for a path, that we can pull from.
		$path  = Request::path();
		$path  = str_replace('/', '.', ltrim(urldecode($path), 'api/media/'));
		$items = array_get($this->media, $path);
		if (!empty($path) && !strstr($path, '.')) {
			//We are getting all the folders, return a random item.
			//This does not have proper depth in it yet.
			foreach ($items as $key => $item) {
				$items[$key] = $this->getItem($item, $path, $key);
			}
		}
		//If we are on /api/media then show all first level items.
		if (empty($path)) {
			$items = array();
			foreach ($this->media as $key => $item) {
				$items[$key] = $this->getAll($item, $path, $key);
			}
		}
		return Response::json(array_values($items));
	}

	//Get Item.
	private function getItem($items, $path, $key) {
		$rand   = array_rand($items);
		$output = array(
			'path'      => $path . '/' . $key,
			'title'     => rtrim($key, '/'),
			'file_name' => $items[$rand]['file_name'],
			'type'      => $items[$rand]['type'],
		);
		if (!empty($items[$rand]['videoSettings'])) {
			$output['videoSettings'] = $items[$rand]['videoSettings'];
		}
		return $output;
	}

	//Ugh, I hate recursion.
	private function getAll($items, $path, $key) {
		$rand   = array_rand($items);
		$child  = array_rand($items[$rand]);
		$output = array(
			'path'      => $path . $key,
			'title'     => ltrim(rtrim($key, '/'), '/'),
			'file_name' => $items[$rand][$child]['file_name'],
			'type'      => $items[$rand][$child]['type'],
		);
		if (!empty($items[$rand][$child]['videoSettings'])) {
			$output['videoSettings'] = $items[$rand][$child]['videoSettings'];
		}
		return $output;
	}

}
