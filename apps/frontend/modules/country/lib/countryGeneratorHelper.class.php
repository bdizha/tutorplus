<?php

/**
 * country module helper.
 *
 * @package    tutorplus
 * @subpackage country
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class countryGeneratorHelper extends BaseCountryGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Location Settings" => "room",
                "Countries" => "country"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "location_settings",
            "current_link" => "countries"
        );
    }

}