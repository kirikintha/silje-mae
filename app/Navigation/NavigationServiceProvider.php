<?php

namespace Navigation;

use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //Bind Dependencies.
        $this->app->bind(
                'Navigation\Common\NavigationInterface', 'Navigation\Common\Navigation'
        );
    }

}
