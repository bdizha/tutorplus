<?php

/**
 * student_contact module helper.
 *
 * @package    tutorplus
 * @subpackage student_contact
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class student_contactGeneratorHelper extends BaseStudent_contactGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/student_contact/new", array("class" => "new")) . '</li>';
    }

    public function linkToDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }
        return '<li class="sf_admin_action_delete">' . link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/student\'"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/student\'"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="submit" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function newBreadcrumbs($object = null) {
        $student = StudentTable::getInstance()->find($object->getStudentId());
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student",
                //is_object($student) ? $student->getName() : "" => is_object($student) ? "student/" . $student->getId() . "/edit" : "",
                "New Contact Details" => "student_contact/new",
            )
        );
    }

    public function newLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "students",
            "is_profile" => false
        );
    }

    public function editBreadcrumbs($object = null) {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student",
                $object->getStudent()->getName() => "student_contact/" . $object->getId() . "/edit",
                "Edit Contact Details" => "student_contact/" . $object->getId() . "/edit",
            )
        );
    }

    public function editLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "students",
            "is_profile" => false
        );
    }

}