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
    
    public function indexBreadcrumbs() {
        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $course = CourseTable::getInstance()->findOneById($courseId);
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getId(),
                "Meeting Times" => "course_meeting_time"
            )
        );
    }

    public function indexLinks() {
        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_meeting_times",
            "is_profile" => false,
            "id" => $courseId
        );
    }

}