<?php

class Profile extends \Eloquent {

    protected $fillable = array('name', 'address_1', 'address_2', 'postal_code', 'state_province', 'country', 'data');
    protected $table = 'users_profiles';

    public function user() {
        return $this->belongsTo('User');
    }

    public function organization() {
        return $this->belongsTo('Organization');
    }

}
