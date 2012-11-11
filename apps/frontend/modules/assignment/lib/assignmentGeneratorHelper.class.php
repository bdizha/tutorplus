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

    public $course = null;

    public function setCourse($course) {
        $this->course = $course;
    }

    public function linkToMyCourse($params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/course/' . sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null) . '\';return false"/>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getId(),
                "Assignments" => "assignment"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments",
            "slug" => $this->course->getSlug()
        );
    }

    public function newBreadcrumbs() {
        $this->courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        $this->course = CourseTable::getInstance()->findOneById($this->courseId);
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getId(),
                "Assignments" => "assignment",
                "New Assignment" => "assignment/new"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments",
            "slug" => $this->course->getSlug()
        );
    }

    public function editBreadcrumbs($object) {
        $this->course = $object->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getId(),
                "Assignments" => "assignment",
                $object->getTitle() => "assignment/" . $object->getId() . "/edit"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments",
            "slug" => $this->course->getSlug()
        );
    }

    public function showBreadcrumbs($assignment) {
        $this->course = $assignment->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "course",
                "My Course" => "my_course",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getId(),
                "Assignments" => "assignment",
                $assignment->getTitle() => "assignment/" . $assignment->getId()
            )
        );
    }

    public function showLinks($assignment) {
        $this->course = $assignment->getCourse();
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments",
            "is_profile" => true,
            "slug" => $this->course->getSlug()
        );
    }

    public function showToEdit($object) {
        return '<span class="actions"><a id="edit_assignment" href="/assignment/' . $object->getId() . '/edit">Edit</a></span>';
    }

}