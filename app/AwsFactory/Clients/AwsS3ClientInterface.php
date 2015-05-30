<?php

/**
 * @file AwsS3ClientInterface.php
 *  This is the interface for connecting to the AWS SDK.
 */

namespace AwsFactory\Clients;

interface AwsS3ClientInterface {

    public function testConnection();

    public function isValid($name = null);

    public function exists($name = null);
    
    public function getIterator($command, $variables = array(), $arguments = array());
    
    public function getObject($variables = array());
    
    public function deleteObject($variables = array());
}
