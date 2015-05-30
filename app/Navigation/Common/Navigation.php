<?php

/**
 * @file NavigationInterface.php
 *  This is the manager for the navigation interface.
 */

namespace Navigation\Common;

use Report\Models\Report;

class Navigation implements NavigationInterface {

    private $user;
    public $navbarItems = array();
    //Admin items for a user.
    public $adminItems = array(
        'name' => 'Admin',
        'items' => array(
            array(
                'class' => 'dropdown-header',
                'name' => 'Reports',
                'icon' => 'glyphicon-stats',
            ),
            array(
                'url' => '/admin/reports',
                'name' => 'View Reports',
            ),
            array(
                'url' => '/admin/reports/create',
                'name' => 'Create Report',
            ),
            array(
                'class' => 'divider',
            ),
            array(
                'class' => 'dropdown-header',
                'name' => 'Billing Sources',
                'icon' => 'glyphicon-transfer',
            ),
            array(
                'url' => '/admin/sources',
                'name' => 'View Sources',
            ),
            array(
                'url' => '/admin/sources/create',
                'name' => 'Create Source',
            ),
            array(
                'class' => 'divider',
            ),
        ),
    );
    //Profile Items
    public $accountItems = array(
        'name' => 'My Account',
        'items' => array(
            array(
                'class' => 'dropdown-header',
                'name' => 'Profile',
                'icon' => 'glyphicon-user',
            ),
            array(
                'url' => '/user',
                'name' => 'View Profile',
            ),
            array(
                'class' => 'dropdown-header',
                'name' => 'EC2 Instances',
                'icon' => 'glyphicon-cloud',
            ),
            array(
                'url' => '/ec2/us-east-1',
                'name' => 'NORTHERN_VIRGINIA',
            ),
            array(
                'url' => '/ec2/us-west-2',
                'name' => 'OREGON',
            ),
            array(
                'class' => 'dropdown-header',
                'name' => 'Route 53',
                'icon' => 'glyphicon-road',
            ),
            array(
                'url' => '/route53',
                'name' => 'View Hosted Zones',
            ),
        )
    );

    /**
     * Get navigation for a user.
     * @param type $user
     */
    public function getNavigation($user) {
        $this->user = $user;
        if (!empty($this->user)) {
            //Get all the items for this user.
            $this->getAll();
        }
    }

    /**
     * Get all reports for a user.
     *  @TODO - we'll have to start group permissions and such through here.
     */
    private function getAll() {
        //Get All of This users Reports.
        $this->navbarItems['my_reports'] = array(
            'name' => 'My Reports',
            'items' => array(),
        );
        $reports = Report::where('user_id', '=', $this->user->id)
                ->orderBy('name')
                ->get();
        $reports->each(function($report) {
            $this->navbarItems['my_reports']['items'][] = array(
                'url' => '/report/' . $report->id,
                'name' => $report->name
            );
        });
        //Get admin Items.
        //@TODO - Sentry will let us see the permissions, so we can update this.
        $this->navbarItems['admin'] = $this->adminItems;
        //Account Items
        $this->navbarItems['account'] = $this->accountItems;
    }

}
