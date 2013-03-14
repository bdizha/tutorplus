<?php

/**
 * tpProfileDetails module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpProfileDetails
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileDetailsGeneratorHelper extends BaseTpProfileDetailsGeneratorHelper
{

    public function indexBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Profile" => "my_info",
                "Settings" => "profile_details",
                "Personal Details" => "profile_details"
            )
        );
    }

    public function indexLinks()
    {
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