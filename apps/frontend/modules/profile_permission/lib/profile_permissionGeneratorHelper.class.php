<?php

/**
 * profile_permission module helper.
 *
 * @package    tutorplus.org
 * @subpackage profile_permission
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_permissionGeneratorHelper extends BaseProfile_permissionGeneratorHelper
{

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "Profiles Permissions" => "profile_permission"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "permissions"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "Profile Permissions" => "profile_permission"
            )
        );
    }

    public function getNewLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "permissions"
        );
    }

    public function getEditBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "Profile Permissions" => "profile_permission"
            )
        );
    }

    public function getEditLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "permissions"
        );
    }

}