<?php

/**
 * sfGuardPermission module helper.
 *
 * @package    tutorplus
 * @subpackage sfGuardPermission
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardPermissionGeneratorHelper extends BaseSfGuardPermissionGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "Profiles Permissions" => "sfGuardPermission"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "permissions"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "User Permissions" => "sfGuardPermission"
            )
        );
    }

    public function newLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "permissions"
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "User Permissions" => "sfGuardPermission"
            )
        );
    }

    public function editLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "permissions"
        );
    }

}