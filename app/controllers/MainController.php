<?php

class MainController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /main
	 *
	 * @return Response
	 */
	public function index() {
		//@TODO - make me a service provider and cache me.
		$files  = File::allFiles(public_path() . '/app');
		$assets = array();
		foreach ($files as $file) {
			if ($file->getExtension() == 'js') {
				$assets[] = str_replace(public_path(), '', $file->getPathname());
			}
		}
		View::share('assets', natsort($assets));
		return View::make('main');
	}

	//To handle missing, we shunt this back into angular.
	public function error($exception) {
		return $this->index();
	}

}
