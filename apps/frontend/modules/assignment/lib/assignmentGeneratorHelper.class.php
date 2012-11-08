<?php

/**
 * assignment module helper.
 *
 * @package    tutorplus
 * @subpackage assignment
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assignmentGeneratorHelper extends BaseAssignmentGeneratorHelper {
    public function linkToMyCourse($params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/course/' . sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null) . '\';return false"/>';
    }

    public function indexBreadcrumbs() {
        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $course = CourseTable::getInstance()->findOneById($courseId);
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getId(),
                "Assignments" => "assignment"
            )
        );
    }

    public function indexLinks() {
        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments",
            "is_profile" => false,
            "id" => $courseId
        );
    }

    public function newBreadcrumbs() {
        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $course = CourseTable::getInstance()->findOneById($courseId);
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getId(),
                "Assignments" => "assignment",
                "New Assignment" => "assignment/new"
            )
        );
    }

    public function newLinks() {
        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $course = CourseTable::getInstance()->findOneById($courseId);
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments"
        );
    }

    public function editBreadcrumbs() {
        $assignmentId = sfContext::getInstance()->getUser()->getMyAttribute('assignment_show_id', null);
        $assignment = AssignmentTable::getInstance()->findOneById($assignmentId);
        $course = $assignment->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getId(),
                "Assignments" => "assignment",
                $assignment->getTitle() => "assignment/" . $assignment->getId() . "/edit"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments"
        );
    }

    public function showBreadcrumbs($assignment) {
        $course = $assignment->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "course",
                "My Course" => "my_course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getId(),
                "Assignments" => "assignment",
                $assignment->getTitle() => "assignment/" . $assignment->getId()
            )
        );
    }

    public function showLinks($assignment) {
        $course = $assignment->getCourse();
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments",
            "is_profile" => true,
            "slug" => $course->getSlug()
        );
    }
    
    public function showToEdit($object) {
        return '<span class="actions"><a id="edit_assignment" href="/assignment/'. $object->getId() .'/edit">Edit</a></span>';
    }

}