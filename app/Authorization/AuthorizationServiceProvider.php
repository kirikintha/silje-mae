<?php

namespace Authorization;

use Illuminate\Support\ServiceProvider;

class AuthorizationServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //Bind Dependencies.
        $this->app->bind(
                'Authorization\Common\AuthorizationInterface', 'Authorization\Common\Authorization'
        );
    }

}
