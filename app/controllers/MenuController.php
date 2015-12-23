<?php

use AwsFactory\Clients\AwsS3ClientInterface;

class MenuController extends Controller {

	private $menus = array();
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
		$this->secret     = \Config::get('app.secret');
		$this->bucket     = \Config::get('app.bucket');
		$this->prefix     = \Config::get('app.prefix');
	}

	/**
	 * Display a listing of the resource.
	 * GET /menu
	 *
	 * @return Response
	 */
	public function index() {
		if (Input::get('forget')) {
			Cache::forget('menus');
		}
		if (Cache::has('menus')) {
			$this->menus = Cache::get('menus');
		} else {
			$this->getMenus();
		}
		return Response::json($this->menus);
	}

	//Get all menus from S3.
	private function getMenus() {
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
				if (!empty($object)) {
					//Look for a menu item.
					$this->setMenuItem($object['Key']);
				}
				unset($object);
			}
		}
		//Cache me.
		$expires = Carbon::now()->addMinutes(1440);
		//Sort menus.
		ksort($this->menus, SORT_NATURAL);
		foreach ($this->menus as $key => $menu) {
			ksort($menu['children'], SORT_NATURAL);
			$this->menus[$key]['children'] = $menu['children'];
		}
		\Cache::put('menus', $this->menus, $expires);
	}

	//Set Menu Item.
	private function setMenuItem($key = null) {
		if (!preg_match('/\.(jpg|jpeg|bpm|mov|png|gif|mp4)$/i', $key)) {
			$key     = str_replace($this->prefix, '', $key);
			$notated = str_replace('/', '.children.', rtrim(ltrim($key, '/'), '/'));
			if (!empty($notated)) {
				array_set($this->menus, $notated, array(
					'path' => rtrim(ltrim($key, '/'), '/'),
					'name' => basename($key),
				));
				unset($notated);
			}
		}
	}

}
