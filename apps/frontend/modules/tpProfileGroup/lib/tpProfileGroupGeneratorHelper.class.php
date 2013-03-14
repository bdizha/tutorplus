<?php

/**
 * tpProfileGroup module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileGroup
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileGroupGeneratorHelper extends BaseTpProfileGroupGeneratorHelper
{

    public function indexBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "Profile Discussions" => "profile_permission"
            )
        );
    }

    public function indexLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "groups"
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "Profile Discussions" => "profile_permission"
            )
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "groups"
        );
    }

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "course",
                "Profile Discussions" => "profile_permission"
            )
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "groups"
        );
    }

}