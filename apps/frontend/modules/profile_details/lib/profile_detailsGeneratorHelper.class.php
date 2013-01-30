<?php

/**
 * profile_details module helper.
 *
 * @package    tutorplus.org
 * @subpackage profile_details
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_detailsGeneratorHelper extends BaseProfile_detailsGeneratorHelper {

  public function indexBreadcrumbs() {
    return array('breadcrumbs' => array(
            "Profile" => "my_info",
            "Settings" => "profile_details",
            "Personal Details" => "profile_details"
        )
    );
  }

  public function indexLinks() {
    $sfUser = sfContext::getInstance()->getUser();
    return array(
        "currentParent" => "profile",
        "current_child" => "my_settings",
        "current_link" => "my_details",
        "slug" => $sfUser->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($sfUser->getId())
    );
  }

}