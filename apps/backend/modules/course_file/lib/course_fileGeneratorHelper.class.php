<?php

/**
 * course module helper.
 *
 * @package    ecollegeplus
 * @subpackage course
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_fileGeneratorHelper extends BaseCourse_fileGeneratorHelper {

    public function indexBreadcrumbs($course) {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug(),
                "Course Files" => "course_file",
            )
        );
    }

    public function indexLinks($course) {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_files",
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