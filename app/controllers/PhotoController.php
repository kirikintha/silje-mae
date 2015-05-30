<?php

class PhotoController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /photo
     *
     * @return Response
     */
    public function index() {
        $path = Request::path();
        $thumbnails = array();
        if (Cache::has('photoThumbnails')) {
            $thumbnails = Cache::get('photoThumbnails');
        }
        //@Look for a path, that we can pull from.
        $path = str_replace('/', '.', ltrim(urldecode($path), 'api/photos/'));
        $items = array_get($thumbnails, $path);
        if (!empty($path) && !strstr($path, '.')) {
            //We are getting all the folders, return a random item.
            //This does not have proper depth in it yet.
            foreach ($items as $key => $item) {
                $rand = array_rand($item);
                $items[$key] = array(
                    'path' => $path . '/' . $key,
                    'title' => $key,
                    'file_name' => $item[$rand]['file_name'],
                );
            }
        }
        //If we are on /api/photos then show all first level items.
        if (empty($path)) {
            $items = array();
            foreach ($thumbnails as $key => $item) {
                $rand = array_rand($item);
                $child = array_rand($item[$rand]);
                $items[$key] = array(
                    'path' => $path . '/' . $key,
                    'title' => ltrim($key . '/'),
                    'file_name' => $item[$rand][$child]['file_name'],
                );
            }
        }
        return Response::json($items);
    }

}
