<?php

/**
 * tpCampus module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpCampus
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCampusGeneratorHelper extends BaseTpCampusGeneratorHelper
{

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Location Settings" => "room",
                "Campuses" => "campus"
            )
        );
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "location_settings",
            "current_link" => "campuses",
            "is_profile" => false
        );
    }

}