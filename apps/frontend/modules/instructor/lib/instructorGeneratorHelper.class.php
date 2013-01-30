<?php

/**
 * instructor module helper.
 *
 * @package    tutorplus
 * @subpackage instructor
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class instructorGeneratorHelper extends BaseInstructorGeneratorHelper {

    public function linkToAcademic($object, $params) {
        return '<input class="save" type="button" value="Manage Academic Details" onclick="document.location.href=\'/instructor_academic_settings\'"/>';
    }

    public function linkToContact($object, $params) {
        return '<input class="save" type="button" value="Manage Contact Details" onclick="document.location.href=\'/instructor_contact/new\'"/>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "instructor",
                "Instructors" => "instructor"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "instructors"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "instructor",
                "Instructors" => "instructor"
            )
        );
    }

    public function newLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "instructors"
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "instructor",
                "Instructors" => "instructor"
            )
        );
    }

    public function editLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "profile_settings",
            "current_link" => "instructors"
        );
    }

}