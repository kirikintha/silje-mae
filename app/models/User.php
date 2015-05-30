<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUser;

class User extends SentryUser {

    protected $fillable = [];
    public $full_name;
    public $iso_country;
    
    //Rules
    public static $rules = array(
        'first_name' => 'required|alpha|max:32',
        'last_name' => 'required|alpha|max:32',
        'email' => 'required|email|unique:users',
        'password' => 'min:8|confirmed',
        'address_1' => 'required|geo_address',
        'address_2' => 'geo_address',
        'city' => 'required|geo_address',
        'state_province' => 'required|geo_state_province',
        'country' => 'required|geo_country',
        'phone' => 'geo_phone',
        'mobile' => 'geo_phone',
        'work' => 'geo_phone',
    );

    //Profile Relationship
    public function profile () {
        return $this->hasOne('Profile');
    }

}
