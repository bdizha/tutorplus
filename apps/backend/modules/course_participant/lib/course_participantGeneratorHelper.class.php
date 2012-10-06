<?php

/**
 * course_participant module helper.
 *
 * @package    ecollegeplus
 * @subpackage course_link
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_participantGeneratorHelper {

    public function participantsBreadcrumbs($course) {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug()
            )
        );
    }

    public function participantsLinks($course) {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_participants",
            "is_profile" => true,
            "slug" => $course->getSlug()
        );
    }

    public function participantsContentActions($course) {
        return array(
            "list_discussion" => array("title" => "&lt; My Course", "url" => "course/" . $course->getSlug()),
            "manage_students" => array("title" => "Manage Students"),
            "manage_instructors" => array("title" => "Manage Instructors")
        );
    }

}