<?php
/**
 * @file NavigationInterface.php
 *  This is the manager for the navigation interface.
 */

namespace Navigation\Common;

interface NavigationInterface {
    
    public function getNavigation($user);
    
}