<?php

/**
 * activity_template module helper.
 *
 * @package    ecollegeplus
 * @subpackage activity_template
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_templateGeneratorHelper extends BaseActivity_templateGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/activity_template#", array("class" => "new")) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/activity_template#", array("popup_url" => "/backend.php/activity_template/" . $object->getId() . "/edit")) . '</li>';
    }

    public function linkToDelete($object, $params, $is_form_action = false) {
        if ($object->isNew()) {
            return '';
        }

        if (!$is_form_action) {
            return '<li class="sf_admin_action_delete">' . link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        } else {
            return '<li class="sf_admin_form_action_delete">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/activity_template#", array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" ' . '" onclick="document.location.href=\'/backend.php/activity_template\'" value="Cancel"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" ' . '" onclick="document.location.href=\'/backend.php/activity_template\'" value="Done"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Communication Settings" => "communication_settings",
                "Activity Templates" => "activity_template"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "activity_templates",
            "is_profile" => true
        );
    }

}
