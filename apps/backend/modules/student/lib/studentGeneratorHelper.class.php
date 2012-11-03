<?php

/**
 * student module helper.
 *
 * @package    tutorplus
 * @subpackage student
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class studentGeneratorHelper extends BaseStudentGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/student/new", array("class" => "new")) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend_dev.php/student/" . $object->getId() . "/edit") . '</li>';
    }

    public function linkToDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }
        return '<li class="sf_admin_action_delete">' . link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/backend.php/student\'"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/backend.php/student\'"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="submit" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToAcademic($object, $params) {
        return '<input class="save" type="button" value="Manage Academic Details" onclick="document.location.href=\'/backend.php/student_academic_settings\'"/>';
    }

    public function linkToContact($object, $params) {
        return '<input class="save" type="button" value="Manage Contact Details" onclick="document.location.href=\'/backend.php/student_contact/new\'"/>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "students"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "students"
        );
    }

    public function editBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Access Settings" => "student",
                "Students" => "student"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "access_settings",
            "current_link" => "students"
        );
    }

}