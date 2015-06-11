<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */


// Main index.
Route::get('/', ['as' => 'main', 'uses' => 'MainController@index']);

// API ROUTES ==================================  
Route::group(array('prefix' => 'api'), function() {
    Route::get('/media/{path?}', ['as' => 'media', 'uses' => 'MediaController@index'])->where('path', '.+');
    Route::get('/menus', ['as' => 'menus', 'uses' => 'MenuController@index']);
    Route::get('/detect', ['as' => 'detect', 'uses' => 'DetectController@index']);
});
