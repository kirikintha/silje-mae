<?php

namespace Geo;

use Illuminate\Support\ServiceProvider;

class GeoServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //Bind Dependencies.
        $this->app->bind(
                'Geo\Common\GeoInterface', 'Geo\Common\Geo'
        );
    }

}
