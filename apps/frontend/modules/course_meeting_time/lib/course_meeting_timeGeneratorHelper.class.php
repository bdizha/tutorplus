<?php

/**
 * course_meeting_time module helper.
 *
 * @package    tutorplus
 * @subpackage course_meeting_time
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_meeting_timeGeneratorHelper extends BaseCourse_meeting_timeGeneratorHelper {

    public $course = null;

    public function setCourse($course) {
        $this->course = $course;
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getId(),
                "Meeting Times" => "course_meeting_time"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_meeting_times",
            "slug" => $this->course->getSlug()
        );
    }

}