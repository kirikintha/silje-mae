<?php

namespace ViewComposer;

use View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

    public function register() {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot() {
        //Main View composer.
        View::composer('main', function($view) {
            //@TODO - add in classes for the view being invoked.
            $route = \Route::currentRouteName();
            if (!empty($route)) {
                $view->with('classes', sprintf('view-%s', str_replace('.', '-', $route)));
            }
        });
    }

}
