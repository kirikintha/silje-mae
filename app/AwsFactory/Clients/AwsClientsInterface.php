<?php

/**
 * @file AwsS3ClientInterface.php
 *  This is the interface for connecting to the AWS SDK.
 */

namespace AwsFactory\Clients;

interface AwsClientsInterface {

    public function debug($message = 'Debug: ');

    public function formatSize($size);

    public function getMemoryUsage();
}
