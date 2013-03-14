<?php

/**
 * tpStaff module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpStaff
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpStaffGeneratorHelper extends BaseTpStaffGeneratorHelper
{

    public function indexBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "staff",
                "Staff" => "staff"
            )
        );
    }

    public function indexLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "staff",
            "is_profile" => false
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "staff",
                "staffs" => "staff"
            )
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "staff",
            "is_profile" => false
        );
    }

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "staff",
                "Staff" => "staff"
            )
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "staff",
            "is_profile" => false
        );
    }

}