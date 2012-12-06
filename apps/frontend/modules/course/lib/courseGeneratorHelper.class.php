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
                "Courses" => "course"
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
                "Academic Settings" => "academic_settings",
                "Courses" => "course",
                "New Course" => "course/new"
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

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Setting" => "course",
                "Academic Settings" => "academic_settings",
                "Courses" => "course",
                "Edit Course ~ " . $object->getCode() . " ~ " . $object->getName() => "course/" . $object->getId() . "/edit",
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
                "Course" => "course",
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
                "Courses" => "courses",
                "My Courses" => "my_courses"
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
                "Courses" => "my_courses",
                "Course Explorer" => "explore_courses"
            )
        );
    }

    public function courseExplorerLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "courses",
            "current_link" => "explore_courses"
        );
    }

    public function calendarBreadcrumbs($course) {
        return array('breadcrumbs' => array(
                "Courses" => "course",
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

    public function showToEdit($object) {
        return '<span class="actions"><a id="edit_course" href="/course/' . $object->getId() . '/edit">Edit</a></span>';
    }

}