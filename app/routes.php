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
Route::get('/', function() {
    return View::make('main');
});

// API ROUTES ==================================  
Route::group(array('prefix' => 'api'), function() {
    Route::get('/photos/{path?}', ['as' => 'photos', 'uses' => 'PhotoController@index'])->where('path', '.+');
    Route::get('/menus', ['as' => 'menus', 'uses' => 'MenuController@index']);
    Route::get('/detect', ['as' => 'detect', 'uses' => 'DetectController@index']);
});

// CATCH ALL ROUTE =============================  
App::missing(function($exception) { 
    return View::make('main'); 
});
