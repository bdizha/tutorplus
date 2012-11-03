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

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/assignment/new", array("class" => "new")) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/assignment/" . $object->getId() . "/edit") . '</li>';
    }

    public function linkToDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return '<li class="sf_admin_action_delete">' . link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/backend.php/assignment\'"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/backend.php/assignment\'"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="submit" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToMyCourse($params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/backend.php/course/' . sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null) . '\';return false"/>';
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

}