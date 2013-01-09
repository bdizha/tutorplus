<?php

/**
 * state_province module helper.
 *
 * @package    tutorplus
 * @subpackage state_province
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class state_provinceGeneratorHelper extends BaseState_provinceGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Location Settings" => "country",
                "State Provinces" => "state_province"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "location_settings",
            "current_link" => "state_provincies",
            "is_profile" => false
        );
    }

}
