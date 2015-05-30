<?php

/**
 * @file AwsS3Client.php
 *  This is the implemenetation of the connection class.
 */

namespace AwsFactory\Clients;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;

class AwsS3Client extends AwsClients implements AwsS3ClientInterface {

    //Types of buckets.
    public $bucket_types = array(
        'bucket' => 'bucket',
        'website' => 'website'
    );
    //Schedule intervals we can use.
    public $frequency = array(
        'hourly' => 'Hourly',
        'daily' => 'Daily',
        'weekly' => 'Weekly',
        'monthly' => 'Monthly',
    );
    //Types of sources
    public $source_types = array(
        'billing' => 'Billing',
        'sal' => 'Server Access Logs'
    );
    //Default path
    public $log_path_default = 'logs/';
    //Source model we are using.
    public $source;
    //These are the iterator objects we can use.
    public $objects;
    //Global Tallies.
    public $count = 0;
    public $total = 0;
    //Keys (Names) of Imported Items, used when updating.
    public $imported = array();
    //Rules attached to this API, so we can keep rules dynamic if need be.
    public $rules = array();

    /**
     * Set a connection string, based on the request you are sending.
     * @param type $this->request
     * @return boolean
     */
    private function setConnection() {
        try {
            //Decrypt Keys
            $this->response['access_key'] = Crypt::decrypt($this->request['access_key']);
            $this->response['secret'] = Crypt::decrypt($this->request['secret']);
            $this->response['region'] = $this->request['region'];
            $this->response['bucket'] = $this->request['bucket'];
            $this->response['bucket_type'] = !empty($this->request['bucket_type']) ? $this->request['bucket_type'] : 'bucket';
            $this->response['prefix'] = !empty($this->request['prefix']) ? $this->request['prefix'] : null;
            //Always reset the connection.
            $this->response['connected'] = false;
            //Set config and client.
            Config::set('aws::config.key', $this->response['access_key']);
            Config::set('aws::config.secret', $this->response['secret']);
            Config::set('aws::config.region', $this->response['region']);
            $this->client = \AWS::get('s3');
            return true;
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            $this->response['errorMessage'] = 'Set Connection: ' . $ex->getMessage();
            return false;
        }
    }

    /**
     * Test a connection to S3.
     *  This presumes that the connection access_keys are encrypted and need to be decrypted
     * @param type $this->request
     */
    public function testConnection() {
        //Set the connection string.
        $success = $this->setConnection();
        if ($success === true) {
            $this->connect();
        }
    }

    /**
     * Connect To either a website or list buckets, depending on if it is a static
     *  website, or if it is a normal S3 bucket.
     */
    private function connect() {
        //Test Connection.
        try {
            $buckets = array(
                'Bucket' => $this->response['bucket'],
            );
            switch ($this->response['bucket_type']) {
                case 'website':
                    $this->response['content'] = $this->client->getBucketWebsite($buckets);
                    break;
                default:
                    $this->response['content'] = $this->client->listBuckets($buckets);
                    break;
            }
            $this->response['connected'] = true;
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            $this->response['errorMessage'] = 'Test Connection: ' . $ex->getMessage();
        }
    }

    /**
     * List objects for a bucket.
     * @param type $this->request
     * @return type
     */
    public function listObjects() {
        try {
            $this->testConnection();
            if ($this->response['connected'] === true) {
                $variables = array(
                    //Your bucket.
                    'Bucket' => $this->response['bucket'],
                    'Prefix' => $this->response['prefix'],
                );
                //@TODO - allow arguments.
                $arguments = array();
                //Make request from Client.
                $this->objects = $this->getIterator('ListObjects', $variables, $arguments);
                $this->count = iterator_count($this->objects);
                $this->objects->rewind();
            } else {
                \Session::flash('danger', sprintf('Run Import: Cound not connect to %s', $this->source->name));
            }
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            //@TODO - convert to S3 error, and nothing is getting flagged.
            //@TODO - also on billing API.
            \Session::flash('danger', 'List Objects: ' . $ex->getMessage());
        }
    }

    /**
     * Check if an item has already been imported into this source.
     * @param type $object
     * @return boolean
     */
    public function checkImported($object) {
        if (!empty($this->source->data)) {
            if (in_array($object['Key'], $this->source->data)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Update the source with the imported keys
     */
    public function updateSource() {
        if (!empty($this->imported)) {
            $data = $this->source->data;
            if (empty($data)) {
                $data = array();
            }
            foreach ($this->imported as $key) {
                $data[] = $key;
            }
            $this->source->data = $data;
            $this->source->last_updated = date('Y-m-d H:i:s', strtotime('now'));
            $this->source->save();
            $this->imported = array();
        }
    }

    /**
     * Test if is a valid bucket name.
     * @param type $name
     * @return type
     */
    public function isValid($name = null) {
        try {
            return $this->client->isValidBucketName($name);
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            \Session::flash('danger', 'isValid: ' . $ex->getMessage());
        }
    }

    /**
     * Test if a bucket exists.
     * @param type $name
     * @return type
     */
    public function exists($name = null) {
        try {
            return $this->client->doesBucketExist($name);
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            \Session::flash('danger', 'Exists: ' . $ex->getMessage());
        }
    }

    /**
     * Test if an object exists.
     * @param type $bucket
     * @param type $key
     * @return type
     */
    public function objectExists($bucket = null, $key = null) {
        try {
            return $this->client->doesObjectExist($bucket, $key);
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            \Session::flash('danger', 'Oobject Exists: ' . $ex->getMessage());
        }
    }

    /**
     * Shorthand for client iterator, allows us an abstract way of making a callback
     *  with an iterator.
     * @param type $command
     * @param type $variables
     * @param type $arguments
     * @return type
     */
    public function getIterator($command, $variables = array(), $arguments = array()) {
        try {
            return $this->client->getIterator($command, $variables, $arguments);
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            \Session::flash('danger', 'Iterator: ' . $ex->getMessage());
        }
    }

    /**
     * Return an object from an iterator command.
     * @param type $variables
     * @return type
     */
    public function getObject($variables = array()) {
        try {
            return $this->client->getObject($variables);
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            \Session::flash('danger', 'Get Object: ' . $ex->getMessage());
        }
    }

    /**
     * Delete an Object
     * @param type $variables
     * @return type
     */
    public function deleteObject($variables = array()) {
        try {
            return $this->client->deleteObject($variables);
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            \Session::flash('danger', 'Delete Object: ' . $ex->getMessage());
        }
    }

    /**
     * Get Bucket Policy
     * @param type $variables
     * @return type
     */
    public function getBucketPolicy($variables = array()) {
        try {
            return $this->client->getBucketPolicy($variables);
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            \Session::flash('danger', 'Bucket Policy: ' . $ex->getMessage());
        }
    }

    /**
     * Get BUcket ACL
     * @param type $variables
     * @return type
     */
    public function getBucketAcl($variables = array()) {
        try {
            return $this->client->getBucketAcl($variables);
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            \Session::flash('danger', 'Bucket ACL: ' . $ex->getMessage());
        }
    }

    /**
     * Put an object to S3
     * @param type $variables
     * @return type
     */
    public function put($variables = array()) {
        try {
            return $this->client->putObject($variables);
        } catch (\Aws\S3\Exception\S3Exception $ex) {
            \Session::flash('danger', 'Bucket ACL: ' . $ex->getMessage());
        }
    }

}
