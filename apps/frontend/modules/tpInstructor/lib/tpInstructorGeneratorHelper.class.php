<?php

/**
 * tpInstructor module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpInstructor
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpInstructorGeneratorHelper extends BaseTpInstructorGeneratorHelper
{

    public function linkToAcademic($object, $params)
    {
        return '<input class="save" type="button" value="Manage Academic Details" onclick="document.location.href=\'/instructor_academic_settings\'"/>';
    }

    public function linkToContact($object, $params)
    {
        return '<input class="save" type="button" value="Manage Contact Details" onclick="document.location.href=\'/instructor_contact/new\'"/>';
    }

    public function indexBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "instructor",
                "Instructors" => "instructor"
            )
        );
    }

    public function indexLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "instructors"
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "instructor",
                "Instructors" => "instructor"
            )
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "instructors"
        );
    }

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "instructor",
                "Instructors" => "instructor"
            )
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "instructors"
        );
    }

}