<?php

/**
 * @file GeoInterface.php
 */

namespace Geo\Common;

interface GeoInterface {

    public function getAllLocations();
    
    public function getAllProvinces();

    public function getCountriesAssoc();

    public function getCountry($iso = null);
}
