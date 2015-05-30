<?php

/**
 * @file AwsClients.php
 *  This is the base client, that extends to all other clients and Apis.
 *  To create enumerators, bring them in an parse on construct.
 *  http://docs.aws.amazon.com/aws-sdk-php/latest/namespace-Aws.Common.Enum.html
 */

namespace AwsFactory\Clients;

use Aws\Common\Enum\Region;

class AwsClients implements AwsClientsInterface {

    /**
     * AWS Regions
     * @var type 
     */
    public $regions = array();

    /**
     * Connection Information
     * @var type 
     */
    public $request = array(
        'access_key' => null,
        'secret' => null,
        'region' => null,
    );
    public $response = array(
        'connected' => false,
        'errorMessage' => null,
        'access_key' => null,
        'secret' => null,
        'region' => null,
        'content' => null,
    );
    //This is the Client from AWS Tools. (S3, etc)
    public $client;

    /**
     * Enumerate values here.
     */
    public function __construct() {
        $this->getRegions();
    }

    /**
     * Get Regions
     */
    public function getRegions() {
        $regions = Region::values();
        foreach ($regions as $name => $region) {
            $this->regions[$region] = $name;
        }
    }

    public function debug($message = 'Debug: ') {
        $out = $this->getMemoryUsage();
        print_r(sprintf("%s %s\n", $message, $out));
    }

    public function formatSize($size) {
        $units = array(' B', ' KB', ' MB', ' GB', ' TB');
        for ($i = 0; $size > 1024; $i++) {
            $size /= 1024;
        }
        return round($size, 2) . $units[$i];
    }

    /**
     * Get Memory Usage in human readable form
     * @return type
     */
    public function getMemoryUsage() {
        return $this->formatSize(memory_get_usage());
    }

}
