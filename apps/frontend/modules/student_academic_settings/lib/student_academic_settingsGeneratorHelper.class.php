<?php

/**
 * student_academic_settings module helper.
 *
 * @package    tutorplus
 * @subpackage student_academic_settings
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class student_academic_settingsGeneratorHelper extends BaseStudent_academic_settingsGeneratorHelper {   
    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student",
                $object->getName() => "student/" . $object->getId() ."/edit",
                "Edit Academic Details" => "instructor_contact/" . $object->getId() . "/edit",
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "students",
            "is_profile" => false
        );
    }

}