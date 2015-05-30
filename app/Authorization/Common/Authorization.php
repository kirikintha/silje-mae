<?php

/**
 * @file Authorization
 *  Handle authorization through Sentry.
 */

namespace Authorization\Common;

use Illuminate\Support\Facades\Session;

class Authorization implements AuthorizationInterface {

    private $__user;
    public $__error;

    /**
     * Authenticate a user.
     * @param array $credentials
     * @return boolean
     */
    public function authenticate(array $credentials = array()) {
        //Reset Error.
        $this->__error = false;
        try {
            // Authenticate the user
            $this->__user = \Sentry::authenticate($credentials, false);
            return true;
        } catch (\Cartalyst\Sentry\Users\LoginRequiredException $e) {
            $this->__error = 'Email field is required.';
        } catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            $this->__error = 'Password field is required.';
        } catch (\Cartalyst\Sentry\Users\WrongPasswordException $e) {
            $this->__error = 'Wrong password, try again.';
        } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
            $this->__error = 'User was not found.';
        } catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            $this->__error = 'User is not activated.';
        } catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            $this->__error = 'User is suspended.';
        } catch (\Cartalyst\Sentry\Throttling\UserBannedException $e) {
            $this->__error = 'User is banned.';
        }
        if ($this->__error !== false) {
            Session::flash('danger', $this->__error);
            return false;
        }
    }

    /**
     * Set a login session.
     * @return boolean
     */
    public function logIn() {
        //Reset Error.
        $this->__error = false;
        try {
            // Log the user in
            \Sentry::login($this->__user, false);
        } catch (\Cartalyst\Sentry\Users\LoginRequiredException $e) {
            $this->__error = 'Login field is required.';
        } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
            $this->__error = 'User not found.';
        } catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            $this->__error = 'User not activated.';
        } catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            $throttle = Sentry::findThrottlerByUserId($this->__user->id);
            $time = $throttle->getSuspensionTime();
            $this->__error = "User is suspended for [$time] minutes.";
        } catch (\Cartalyst\Sentry\Throttling\UserBannedException $e) {
            $this->__error = 'User is banned.';
        }
        if ($this->__error !== false) {
            Session::flash('danger', $this->__error);
            return false;
        } else {
            Session::flash('success', 'You have been logged in!');
        }
    }
    
    /**
     * Logout a user.
     */
    public function logOut() {
        \Sentry::logout();
        Session::flash('success', 'You have been logged out');
    }

}
