<?php

/**
 * course_meeting_time module helper.
 *
 * @package    ecollegeplus
 * @subpackage course_meeting_time
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_meeting_timeGeneratorHelper extends BaseCourse_meeting_timeGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new"><input class="new" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/course_meeting_time#", array("popup_url" => "/backend.php/course_meeting_time/" . $object->getId() . "/edit")) . '</li>';
    }

    public function linkToDelete($object, $params, $is_form_action = false) {
        if ($object->isNew()) {
            return '';
        }

        if (!$is_form_action) {
            return '<li class="sf_admin_action_delete">' . link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        } else {
            return '<li class="sf_admin_form_action_delete">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/course_meeting_time#", array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" ' . '" value="Cancel"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" ' . '" value="Done"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

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