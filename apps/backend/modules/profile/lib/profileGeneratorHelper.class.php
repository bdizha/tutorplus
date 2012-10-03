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

    public function publicInfoBreadcrumbs() {
        $sfUser = sfContext::getInstance()->getUser();
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Public Info" => "profile/" . $sfUser->getProfile()->getUser()->getSlug()
            )
        );
    }

    public function publicInfoLinks() {
        $sfUser = sfContext::getInstance()->getUser();
        $userId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_info",
            "slug" => $sfUser->getProfile()->getUser()->getSlug(),
            "ignore" => !$sfUser->isCurrent($userId)
        );
    }

    public function discussionBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Discussions" => "profile_timeline"
            )
        );
    }

    public function discussionLinks() {
        $sfUser = sfContext::getInstance()->getUser();
        $userId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_discussions",
            "slug" => $sfUser->getProfile()->getUser()->getSlug(),
            "ignore" => !$sfUser->isCurrent($userId)
        );
    }

    public function accountSettingsBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Account Settings" => "profile_settings"
            )
        );
    }

    public function accountSettingsLinks() {
        $sfUser = sfContext::getInstance()->getUser();
        $userId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_account_settings",
            "slug" => $sfUser->getGuardUser()->getSlug(),
            "ignore" => !$sfUser->isCurrent($userId)
        );
    }

    public function contactDetailsBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Contact Details" => "my_contact_details"
            )
        );
    }

    public function contactDetailsLinks() {
        $sfUser = sfContext::getInstance()->getUser();
        $userId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_contact_details",
            "slug" => $sfUser->getGuardUser()->getSlug(),
            "ignore" => !$sfUser->isCurrent($userId)
        );
    }

    public function peersBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Peers" => "my_peers"
            )
        );
    }

    public function peersLinks() {
        $sfUser = sfContext::getInstance()->getUser();
        $userId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_peers",
            "slug" => $sfUser->getGuardUser()->getSlug(),
            "ignore" => !$sfUser->isCurrent($userId)
        );
    }
}