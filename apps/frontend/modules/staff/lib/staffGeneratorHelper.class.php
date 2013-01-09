<?php

/**
 * staff module helper.
 *
 * @package    tutorplus
 * @subpackage staff
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staffGeneratorHelper extends BaseStaffGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "staff",
                "Staff" => "staff"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "staff",
            "is_profile" => false
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "staff",
                "staffs" => "staff"
            )
        );
    }

    public function newLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "staff",
            "is_profile" => false
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "staff",
                "Staff" => "staff"
            )
        );
    }

    public function editLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "staff",
            "is_profile" => false
        );
    }

}