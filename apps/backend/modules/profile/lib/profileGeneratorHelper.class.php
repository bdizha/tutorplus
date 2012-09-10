<?php

/**
 * profile module helper.
 *
 * @package    ecollegeplus
 * @subpackage profile
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileGeneratorHelper extends BaseProfileGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/profile", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/profile", array("popup_url" => "/backend.php/profile/" . $object->getId() . "/edit")) . '</li>';
    }

    public function linkToDelete($object, $params, $is_form_action = false) {
        if ($object->isNew()) {
            return '';
        }

        if (!$is_form_action) {
            return '<li class="sf_admin_action_delete">' . link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function aboutBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_discussions",
                "About" => "my_info"
            )
        );
    }

    public function aboutLinks() {
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_info",
            "is_profile" => true
        );
    }

    public function discussionBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_discussions",
                "Discussions" => "profile_discussions"
            )
        );
    }

    public function discussionLinks() {
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_discussions",
            "is_profile" => true
        );
    }

    public function accountSettingsBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_discussions",
                "Account Settings" => "profile_settings"
            )
        );
    }

    public function accountSettingsLinks() {
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_account_settings",
            "is_profile" => true
        );
    }

    public function contactDetailsBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_discussions",
                "Contact Details" => "my_contact_details"
            )
        );
    }

    public function contactDetailsLinks() {
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_contact_details",
            "is_profile" => true
        );
    }

    public function peersBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_discussions",
                "Peers" => "my_peers"
            )
        );
    }

    public function peersLinks() {
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_peers",
            "is_profile" => true
        );
    }

}