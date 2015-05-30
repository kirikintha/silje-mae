<?php

class MenuController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /menu
     *
     * @return Response
     */
    public function index() {
        $items = array();
        if (Cache::has('photoThumbnails')) {
            $items = Cache::get('photoMenuItems');
        }
        return Response::json($items);
    }

}
