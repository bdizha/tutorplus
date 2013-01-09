<?php

/**
 * notification_settings module helper.
 *
 * @package    tutorplus
 * @subpackage notification_settings
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class notification_settingsGeneratorHelper extends BaseNotification_settingsGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/notification_settings#", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/notification_settings#", array("popup_url" => "/notification_settings/" . $object->getId() . "/edit")) . '</li>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input type="submit" value=" ' . __($params['label'], array(), 'sf_admin') . ' " class="save"></li>';
    }

    public function editBreadcrumbs($object) {
        $sfUser = sfContext::getInstance()->getUser();
        return array('breadcrumbs' => array(
                "Profile" => "profile/" . $sfUser->getProfile()->getSlug(),
                "Notification Settings" => "my_notification_settings"
            )
        );
    }

    public function editLinks() {
        $sfUser = sfContext::getInstance()->getUser();
        $profileId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "currentParent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_notification_settings",
            "ignore" => !$sfUser->isCurrent($profileId),
            "slug" => $sfUser->getProfile()->getSlug()
        );
    }

}