<?php

/**
 * profile module helper.
 *
 * @package    tutorplus
 * @subpackage profile
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileGeneratorHelper extends BaseProfileGeneratorHelper {

  public function timelineBreadcrumbs() {
    return array('breadcrumbs' => array(
            "Profile" => "profile_timeline",
            "Timeline" => "profile_timelime"
        )
    );
  }

  public function timelineLinks() {
    $sfUser = sfContext::getInstance()->getUser();
    $profileId = $sfUser->getMyAttribute('profile_show_id', null);
    return array(
        "current_parent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_timeline",
        "slug" => $sfUser->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($profileId)
    );
  }

  public function publicInfoBreadcrumbs() {
    $sfUser = sfContext::getInstance()->getUser();
    return array('breadcrumbs' => array(
            "Profile" => "profile_timeline",
            "Public Info" => "profile/" . $sfUser->getProfile()->getProfile()->getSlug()
        )
    );
  }

  public function publicInfoLinks() {
    $sfUser = sfContext::getInstance()->getUser();
    $profileId = $sfUser->getMyAttribute('profile_show_id', null);
    return array(
        "current_parent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_info",
        "slug" => $sfUser->getProfile()->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($profileId)
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
    $profileId = $sfUser->getMyAttribute('profile_show_id', null);
    return array(
        "current_parent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_timeline",
        "slug" => $sfUser->getProfile()->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($profileId)
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
    $profileId = $sfUser->getMyAttribute('profile_show_id', null);
    return array(
        "current_parent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_account_settings",
        "slug" => $sfUser->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($profileId)
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
    $profileId = $sfUser->getMyAttribute('profile_show_id', null);
    return array(
        "current_parent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_contact_details",
        "slug" => $sfUser->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($profileId)
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
    $profileId = $sfUser->getMyAttribute('profile_show_id', null);
    return array(
        "current_parent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_peers",
        "slug" => $sfUser->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($profileId)
    );
  }

  public function linkToPublicationEdit($object, $params) {
    return link_to(__('Edit', array(), 'sf_admin'), "/profile/publication/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_publication"));
  }

  public function linkToBookEdit($object, $params) {
    return link_to(__('Edit', array(), 'sf_admin'), "/profile/book/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_book"));
  }

  public function linkToInterestEdit($object, $params) {
    return link_to(__('Edit', array(), 'sf_admin'), "/profile/interest/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_interest"));
  }

}