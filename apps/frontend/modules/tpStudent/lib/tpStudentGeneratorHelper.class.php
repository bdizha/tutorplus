<?php

/**
 * tpStudent module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpStudent
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpStudentGeneratorHelper extends BaseTpStudentGeneratorHelper
{

    public function linkToAcademic($object, $params)
    {
        return '<input class="save" type="button" value="Manage Academic Details" onclick="document.location.href=\'/student_academic_settings\'"/>';
    }

    public function linkToContact($object, $params)
    {
        return '<input class="save" type="button" value="Manage Contact Details" onclick="document.location.href=\'/student_contact/new\'"/>';
    }

    public function indexBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student"
            )
        );
    }

    public function indexLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "students"
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student"
            )
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "students"
        );
    }

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student"
            )
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "students"
        );
    }

}