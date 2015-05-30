<?php

/**
 * @file Geo
 *  Geographical and location services.
 */

namespace Geo\Common;

use Geo\Models\Country;

class Geo implements GeoInterface {

    //Return All ISO Country Locations.
    public function getAllLocations() {
        $geo = new Country;
        $locations = $geo->locations;
        ksort($locations, SORT_NATURAL);
        return $locations;
    }
    
    public function getAllProvinces() {
        $locations = $this->getAllLocations();
        $provinces = array();
        foreach ($locations as $location) {
            foreach($location['provinces'] as $province) {
                $provinces[] = html_entity_decode($province);
            }
        }
        return $provinces;
    }

    //Return a country by ISO 3 name.
    public function getCountry($iso = null) {
        if (!empty($iso)) {
            $locations = $this->getAllLocations();
            if (!empty($locations[$iso])) {
                $location = $locations[$iso];
                $location['name'] = html_entity_decode($location['name']);
                $location['provinces'] = $this->__provincesAssoc($location['provinces']);
                return $location;
            }
        }
        return false;
    }
    
    //Get countries in an associative list.
    public function getCountriesAssoc () {
        $locations = $this->getAllLocations();
        $output = array();
        foreach ($locations as $key => $location) {
            $output[$key] = html_entity_decode($location['name']);
        }
        return $output;
    }
    
    //Create an associative array of provinces.
    private function __provincesAssoc($provinces = array()) {
        $output = array();
        foreach ($provinces as $province) {
            $output[$province] = html_entity_decode($province);
        }
        ksort($output, SORT_NATURAL);
        return $output;
    }

}
