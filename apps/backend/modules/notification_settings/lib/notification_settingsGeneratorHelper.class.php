<?php

/**
 * notification_settings module helper.
 *
 * @package    ecollegeplus
 * @subpackage notification_settings
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class notification_settingsGeneratorHelper extends BaseNotification_settingsGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/notification_settings#", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/notification_settings#", array("popup_url" => "/backend.php/notification_settings/" . $object->getId() . "/edit")) . '</li>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input type="submit" value=" ' . __($params['label'], array(), 'sf_admin') . ' " class="save"></li>';
    }

    public function editBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_discussions",
                "Notification Settings" => "my_notification_settings"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_notification_settings",
            "is_profile" => true
        );
    }

}