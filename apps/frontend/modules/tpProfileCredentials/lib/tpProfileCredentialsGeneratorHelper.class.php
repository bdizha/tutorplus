<?php

/**
 * tpProfileCredentials module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileCredentials
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileCredentialsGeneratorHelper extends BaseTpProfileCredentialsGeneratorHelper
{

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Profile" => "my_info",
                "Settings" => "profile_details",
                "My Credentials" => "profile_credentials"
            )
        );
    }

    public function getLinks()
    {
        $sfUser = sfContext::getInstance()->getUser();
        return array(
            "currentParent" => "profile",
            "current_child" => "profile_settings",
            "current_link" => "my_credentials",
            "slug" => $sfUser->getProfile()->getSlug(),
            "ignore" => !$sfUser->isCurrent($sfUser->getId())
        );
    }

}