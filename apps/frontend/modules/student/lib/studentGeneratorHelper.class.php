<?php

/**
 * student module helper.
 *
 * @package    tutorplus
 * @subpackage student
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class studentGeneratorHelper extends BaseStudentGeneratorHelper {

    public function linkToAcademic($object, $params) {
        return '<input class="save" type="button" value="Manage Academic Details" onclick="document.location.href=\'/student_academic_settings\'"/>';
    }

    public function linkToContact($object, $params) {
        return '<input class="save" type="button" value="Manage Contact Details" onclick="document.location.href=\'/student_contact/new\'"/>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "students"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "students"
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "students"
        );
    }

}