<?php

/**
 * assignment_group_group module helper.
 *
 * @package    ecollegeplus
 * @subpackage assignment_group_group
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assignment_groupGeneratorHelper extends BaseAssignment_groupGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/assignment_group#", array("class" => "new")) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/assignment_group/" . $object->getId() . "/edit", array("popup_url" => "/backend.php/assignment_group/" . $object->getId() . "/edit")) . '</li>';
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
        return '<input class="cancel" type="button" ' . '" onclick="document.location.href=\'/backend.php/assignment_group\';return false" value="Cancel"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" ' . '" onclick="document.location.href=\'/backend.php/assignment_group\';return false" value="Done"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
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
                "Assignment Groups" => "assignment_group"
            )
        );
    }

    public function indexLinks() {
        $courseId = sfContext::getInstance()->getUser()->getMyAttribute('course_show_id', null);
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "assignment_groups",
            "is_profile" => false,
            "id" => $courseId
        );
    }

}