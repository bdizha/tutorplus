<?php

/**
 * profile module helper.
 *
 * @package    ecollegeplus
 * @subpackage profile
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardGeneratorHelper extends sfModelGeneratorHelper {

    public function getUrlForAction($action) {
        return 'list' == $action ? 'profile' : 'profile_' . $action;
    }

    public function dashboardBreadcrumbs() {
        return array('breadcrumbs' => array(
                "My Dashboard" => "dashboard",
            )
        );
    }

    public function dashboardLinks() {
        return array(
            "current_parent" => "dashboard",
            "current_child" => "my_dashboard",
            "current_link" => "my_dashboard"
        );
    }

}