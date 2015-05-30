<?php

class Organization extends \Eloquent {

    protected $fillable = array('name', 'address_1', 'address_2', 'postal_code', 'state_province', 'country', 'data');
    protected $table = 'users_organizations';
    //Rules
    public static $rules = array(
        'name' => 'required|alpha_name|max:32',
        'account_id' => 'required|integer',
        'access_key' => 'required|iam_access_key',
        'secret' => 'required|iam_secret_key',
        'address_1' => 'required|geo_address',
        'address_2' => 'geo_address',
        'city' => 'required|geo_address',
        'state_province' => 'required|geo_state_province',
        'country' => 'required|geo_country',
        'phone' => 'geo_phone',
        'mobile' => 'geo_phone',
        'work' => 'geo_phone',
    );
    
    //Unserialize Data
    public function getDataAttribute($value) {
        return unserialize($value);
    }

    public function setDataAttribute($value) {
        $this->attributes['data'] = serialize($value);
    }

    public function profile() {
        return $this->hasMany('Profile');
    }

}
