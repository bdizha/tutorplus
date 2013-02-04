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
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/my/course/' . $this->course->getSlug() . '\';return false"/>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $this->course->getCode() . " ~ " . $this->course->getName() => 'my/course/' . $this->course->getSlug(),
                "Assignments" => "assignment"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments",
            "slug" => $this->course->getSlug()
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getId(),
                "Assignments" => "assignment",
                "New Assignment" => "assignment/new"
            )
        );
    }

    public function getNewLinks() {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments",
            "slug" => $this->course->getSlug()
        );
    }

    public function getEditBreadcrumbs($object) {
        $this->course = $object->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "my_courses",
                $this->course->getCode() . " ~ " . $this->course->getName() => 'my/course/' . $this->course->getSlug(),
                "Assignments" => "assignment",
                $object->getTitle() => "assignment/" . $object->getId() . "/edit"
            )
        );
    }

    public function getEditLinks() {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments",
            "slug" => $this->course->getSlug()
        );
    }

    public function getShowBreadcrumbs($assignment) {
        $this->course = $assignment->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "course",
                "My Course" => "my_course",
                $this->course->getCode() . " ~ " . $this->course->getName() => 'my/course/' . $this->course->getSlug(),
                "Assignments" => "assignment",
                $assignment->getTitle() => "assignment/" . $assignment->getId()
            )
        );
    }

    public function getShowLinks($assignment) {
        $this->course = $assignment->getCourse();
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignments",
            "is_profile" => true,
            "slug" => $this->course->getSlug()
        );
    }

    public function showToEdit($object, $sf_user) {
        if ($sf_user->isSuperAdmin()) {
            return '<span class="actions"><a id="edit_assignment" href="/assignment/' . $object->getId() . '/edit">Edit</a></span>';
        } else {
            return '';
        }
    }

}