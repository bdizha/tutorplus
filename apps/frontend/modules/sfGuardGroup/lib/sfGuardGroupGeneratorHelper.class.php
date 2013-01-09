<?php

/**
 * sfGuardGroup module helper.
 *
 * @package    tutorplus
 * @subpackage sfGuardGroup
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardGroupGeneratorHelper extends BaseSfGuardGroupGeneratorHelper
{

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "User Groups" => "sfGuardGroup"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "groups"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "User Groups" => "sfGuardGroup"
            )
        );
    }

    public function newLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "groups"
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "User Groups" => "sfGuardGroup"
            )
        );
    }

    public function editLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "groups"
        );
    }
}