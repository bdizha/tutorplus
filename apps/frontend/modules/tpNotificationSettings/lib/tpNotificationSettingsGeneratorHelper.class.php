<?php

/**
 * tpNotificationSettings module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpNotificationSettings
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpNotificationSettingsGeneratorHelper extends BaseTpNotificationSettingsGeneratorHelper
{

    public function getBreadcrumbs()
    {
        $sfUser = sfContext::getInstance()->getUser();
        return array('breadcrumbs' => array(
                "Profile" => $sfUser->getProfile()->getSlug(),
                "Settings" => "profile_details",
                "Notification Settings" => "profile_credentials"
            )
        );
    }

    public function getLinks()
    {
        $sfUser = sfContext::getInstance()->getUser();
        return array(
            "currentParent" => "profile",
            "current_child" => "my_settings",
            "current_link" => "notifications_settings",
            "slug" => $sfUser->getProfile()->getSlug(),
            "id" => $sfUser->getProfile()->getId(),
            "ignore" => !$sfUser->isCurrent($sfUser->getId())
        );
    }
    
    public function getEditLinks()
    {
        return $this->getLinks();
    }

}