<?php

namespace Validator;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider {
    
    public function register() {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot() {
        //Bind Dependencies.
        $this->app->validator->resolver(function( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
            return new Common\ValidatorExtended($translator, $data, $rules, $messages, $customAttributes);
        });
    }

}
