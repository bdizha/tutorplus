<?php

/**
 * profile_credentials module helper.
 *
 * @package    tutorplus.org
 * @subpackage profile_credentials
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_credentialsGeneratorHelper extends BaseProfile_credentialsGeneratorHelper {

  public function indexBreadcrumbs() {
    return array('breadcrumbs' => array(
            "Profile" => "my_info",
            "Settings" => "profile_details",
            "My Credentials" => "profile_credentials"
        )
    );
  }

  public function indexLinks() {
    $sfUser = sfContext::getInstance()->getUser();
    return array(
        "currentParent" => "profile",
        "current_child" => "my_settings",
        "current_link" => "my_credentials",
        "slug" => $sfUser->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($sfUser->getId())
    );
  }

}