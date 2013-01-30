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

  public function editBreadcrumbs($object) {
    $sfUser = sfContext::getInstance()->getUser();
    return array('breadcrumbs' => array(
            "Profile" => "profile/" . $sfUser->getProfile()->getSlug(),
            "Email Settings" => "my_notification_settings"
        )
    );
  }

  public function editLinks() {
    $sfUser = sfContext::getInstance()->getUser();
    return array(
        "currentParent" => "profile",
        "current_child" => "my_settings",
        "current_link" => "my_email_settings",
        "slug" => $sfUser->getProfile()->getSlug(),
        "ignore" => !$sfUser->isCurrent($sfUser->getId())
    );
  }

}