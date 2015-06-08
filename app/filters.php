<?php

// CATCH ALL ROUTE =============================  
App::missing(function($exception) {
    return App::make('MainController')->error($exception);
});

/*
  |--------------------------------------------------------------------------
  | Application & Route Filters
  |--------------------------------------------------------------------------
  |
  | Below you will find the "before" and "after" events for the application
  | which may be used to do any work before or after a request into your
  | application. Here you may also register your custom route filters.
  |
 */

App::before(function($request) {
    //
});


App::after(function($request, $response) {
    //
});

/*
  |--------------------------------------------------------------------------
  | Authentication Filters
  |--------------------------------------------------------------------------
  |
  | The following filters are used to verify that the user of the current
  | session is logged into this application. The "basic" filter easily
  | integrates HTTP Basic authentication for quick, simple checking.
  |
 */

Route::filter('auth', function() {
    $logged_in = Sentry::check();
    if ($logged_in !== true) {
        return Redirect::to('/')
                        ->with('warning', 'Please login to continue.');
    }
});


Route::filter('auth.basic', function() {
    $logged_in = Sentry::check();
    if ($logged_in !== true) {
        return Redirect::to('/')
                        ->with('warning', 'Please login to continue.');
    } else {
        //@TODO
    }
});

//Only allow superusers and admins into the admin section
Route::filter('auth.admin', function() {
    $logged_in = Sentry::check();
    if ($logged_in !== true) {
        return Redirect::to('/')
                        ->with('warning', 'Please login to continue.');
    } else {
        //@TODO
        $access = Sentry::getUser()->hasAccess(array('admin.view'));
        if ($access !== true) {
            return Redirect::to('/')
                            ->with('error', 'Sorry, you do not have access to this resource.');
        }
    }
});

/*
  |--------------------------------------------------------------------------
  | Guest Filter
  |--------------------------------------------------------------------------
  |
  | The "guest" filter is the counterpart of the authentication filters as
  | it simply checks that the current user is not logged in. A redirect
  | response will be issued if they are, which you may freely change.
  |
 */

Route::filter('guest', function() {
    $logged_in = Sentry::check();
    if ($logged_in !== true) {
        return Redirect::to('/')
                        ->with('warning', 'Please login to continue.');
    }
});

/*
  |--------------------------------------------------------------------------
  | CSRF Protection Filter
  |--------------------------------------------------------------------------
  |
  | The CSRF filter is responsible for protecting your application against
  | cross-site request forgery attacks. If this special token in a user
  | session does not match the one given in this request, we'll bail.
  |
 */

Route::filter('csrf', function() {
    if (Session::token() != Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
