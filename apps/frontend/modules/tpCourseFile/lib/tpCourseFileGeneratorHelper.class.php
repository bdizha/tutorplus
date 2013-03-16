<?php

/**
 * course module helper.
 *
 * @package    tutorplus
 * @subpackage course
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCourseFileGeneratorHelper extends BaseTpCourseFileGeneratorHelper {

    public function getBreadcrumbs($course) {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug(),
                "Course Files" => "tpCourseFile",
            )
        );
    }

    public function getLinks($course) {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "tpCourseFiles",
            "is_profile" => true,
            "slug" => $course->getSlug()
        );
    }

    public function indexContentActions() {
        return array(
            "add_folder" => array("title" => "+ Create Folder"),
            "upload_file" => array("title" => "+ Upload File"),
        );
    }

}