<?php

/**
 * mailing_list module helper.
 *
 * @package    tutorplus
 * @subpackage mailing_list
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mailing_listGeneratorHelper extends BaseMailing_listGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/mailing_list/new", array("class" => "new")) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/mailing_list/" . $object->getId() . "/edit") . '</li>';
    }

    public function linkToDelete($object, $params, $is_form_action = false) {
        if ($object->isNew()) {
            return '';
        }

        if (!$is_form_action) {
            return '<li class="sf_admin_action_delete">' . link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        } else {
            return '<li class="sf_admin_form_action_delete">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/mailing_list#", array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/backend.php/mailing_list\'"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/backend.php/mailing_list\'"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="submit" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "mailing_list"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "mailing_lists",
            "is_profile" => true
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "mailing_list"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "mailing_lists",
            "is_profile" => true
        );
    }

    public function editBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "mailing_list"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "mailing_lists",
            "is_profile" => true
        );
    }

}