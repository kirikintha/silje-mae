<?php

class DetectController extends Controller {

    /**
     * Display a listing of the resource.
     * GET /detect
     *
     * @return Response
     */
    public function index() {
        $detect = BrowserDetect::detect();
        return Response::json($detect);
    }

}
