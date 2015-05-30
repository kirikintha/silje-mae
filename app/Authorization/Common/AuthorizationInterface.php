<?php
/**
 * @file AuthorizationInterface.php
 */

namespace Authorization\Common;

interface AuthorizationInterface {
    
    //Authenticate a user.
    public function authenticate(array $credentials = array());
    
    //Login
    // @TODO - remember me.
    public function logIn();
    
    //Logout
    public function logOut();
    
}