<?php

/**
 * tpDashboard module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpDashboard
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpDashboardGeneratorHelper extends sfModelGeneratorHelper {

    public function getUrlForAction($action) {
        return 'list' == $action ? 'profile' : 'profile_' . $action;
    }

    public function getBreadcrumbs() {
        return array('breadcrumbs' => array());
    }

    public function getLinks() {
        return array(
            "currentParent" => "dashboard",
            "current_child" => "my_dashboard",
            "current_link" => "my_dashboard"
        );
    }

}