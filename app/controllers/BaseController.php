<?php

class BaseController extends Controller {
    
    public $navigation;
    public $user;
    public $loggedIn = false;

    public function __construct() {
        //Create navigation array globally, without having to alter the constructor.
        $this->navigation = App::make('Navigation\Common\NavigationInterface');
        $this->navigation->getNavigation($this->user);
        View::share('navbarItems', $this->navigation->navbarItems);
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function _setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

}
