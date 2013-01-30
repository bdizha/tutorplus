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

  public function publicInfoBreadcrumbs() {
    $sfUser = sfContext::getInstance()->getUser();
    return array('breadcrumbs' => array(
            "Profile" => "profile_show",
            "Public Info" => "profile/" . $sfUser->getProfile()->getSlug()
        )
    );
  }

  public function publicInfoLinks() {
    $sfUser = sfContext::getInstance()->getUser();
    $profileId = $sfUser->getMyAttribute('profile_show_id', null);
    return array(
        "currentParent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_info",
        "slug" => $sfUser->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($profileId)
    );
  }

  public function DiscussionGroupBreadcrumbs() {
    return array('breadcrumbs' => array(
            "Profile" => "profile_timeline",
            "DiscussionGroups" => "profile_timeline"
        )
    );
  }

  public function DiscussionGroupLinks() {
    $sfUser = sfContext::getInstance()->getUser();
    $profileId = $sfUser->getMyAttribute('profile_show_id', null);
    return array(
        "currentParent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_timeline",
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
        "currentParent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_peers",
        "slug" => $sfUser->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($profileId)
    );
  }

}