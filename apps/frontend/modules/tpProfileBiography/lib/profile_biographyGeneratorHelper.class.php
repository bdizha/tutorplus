<?php

/**
 * profile_biography module helper.
 *
 * @package    tutorplus.org
 * @subpackage profile_biography
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_biographyGeneratorHelper extends BaseProfile_biographyGeneratorHelper {

  public function indexBreadcrumbs() {
    return array('breadcrumbs' => array(
            "Profile" => "my_info",
            "Biography" => "profile_biography"
        )
    );
  }

  public function indexLinks() {
    $sfUser = sfContext::getInstance()->getUser();
    $profileId = $sfUser->getMyAttribute('profile_show_id', null);
    return array(
        "currentParent" => "profile",
        "current_child" => "my_profile",
        "current_link" => "my_biography",
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