<?php

namespace AwsFactory;

use Illuminate\Support\ServiceProvider;

class AwsFactoryServiceProvider extends ServiceProvider {

    /**
     * Register the Billing Factory Command.
     */
    public function boot() {
        $commands = array(
            //Billing
            'photos-update',
        );
        $this->commands($commands);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //Bind Dependencies.
        $this->app->bind(
                'AwsFactory\Clients\AwsClientsInterface', 'AwsFactory\Clients\AwsClients'
        );
        
        //S3
        $this->app->bind(
                'AwsFactory\Clients\AwsS3ClientInterface', 'AwsFactory\Clients\AwsS3Client'
        );
        //Bind Commands.
        //@TODO - change names, because we can shorten them?
        $this->app->bindShared('photos-update', function($app) {
            return $this->app->make('AwsFactory\Commands\PhotosUpdateCommand');
        });
    }

}
