<?php

/**
 * course module helper.
 *
 * @package    tutorplus
 * @subpackage course
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class courseGeneratorHelper extends BaseCourseGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "course",
                "Academic Settings" => "academic_settings",
                "Modules" => "course"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "courses"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "course",
                "Communication Settings" => "academic_settings",
                "Modules" => "course"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "courses"
        );
    }

    public function editBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "course",
                "Academic Settings" => "academic_settings",
                "Modules" => "course"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "courses"
        );
    }

    public function showBreadcrumbs($course) {
        return array('breadcrumbs' => array(
                "Module" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug()
            )
        );
    }

    public function showLinks($course) {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_info",
            "is_profile" => true,
            "slug" => $course->getSlug()
        );
    }

    public function myCoursesBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Modules" => "courses",
                "My Modules" => "my_courses"
            )
        );
    }

    public function myCoursesLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
        );
    }

    public function exploreCoursesBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Modules" => "courses",
                "Module Explorer" => "course_explorer"
            )
        );
    }

    public function courseExplorerLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "courses",
            "current_link" => "course_explorer"
        );
    }

    public function calendarBreadcrumbs($course) {
        return array('breadcrumbs' => array(
                "Modules" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug(),
                "Calendar" => "course_calendar"
            )
        );
    }

    public function calendarLinks($course) {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_calendar",
            "slug" => $course->getSlug()
        );
    }

}