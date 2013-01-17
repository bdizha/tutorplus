<?php

/**
 * profile_award module helper.
 *
 * @package    tutorplus
 * @subpackage profile_award
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_awardGeneratorHelper extends BaseProfile_awardGeneratorHelper {

  public function awardBreadcrumbs() {
    $sfUser = sfContext::getInstance()->getUser();
    return array('breadcrumbs' => array(
            "Profile" => "profile/" . $sfUser->getProfile()->getSlug(),
            "Awards" => "profile_award"
        )
    );
  }

  public function awardLinks() {
    $sfUser = sfContext::getInstance()->getUser();
    $profileId = $sfUser->getMyAttribute('profile_show_id', null);
    return array(
        "currentParent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_awards",
        "slug" => $sfUser->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($profileId)
    );
  }

  public function linkToAwardEdit($object, $params) {
    return link_to(__('Edit', array(), 'sf_admin'), "/profile/award/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_award"));
  }

  public function linkToAwardDelete($object, $params) {
    if (!isset($params['type'])) {
      return link_to(__('Remove', array(), 'sf_admin'), 'profile_award_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
    } else {
      return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
    }
  }

}