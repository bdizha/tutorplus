<?php

/**
 * tpRoom module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpRoom
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpRoomGeneratorHelper extends BaseTpRoomGeneratorHelper
{

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Location Settings" => "country",
                "Rooms" => "room"
            )
        );
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "location_settings",
            "current_link" => "rooms",
            "is_profile" => false
        );
    }

}