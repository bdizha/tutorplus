<?php

/**
 * tpStateProvince module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpStateProvince
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpStateProvinceGeneratorHelper extends BaseTpStateProvinceGeneratorHelper
{

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Location Settings" => "country",
                "State Provinces" => "state_province"
            )
        );
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "location_settings",
            "current_link" => "state_provincies",
            "is_profile" => false
        );
    }

}