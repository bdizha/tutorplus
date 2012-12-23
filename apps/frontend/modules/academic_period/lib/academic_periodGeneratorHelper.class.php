<?php

/**
 * academic_period module helper.
 *
 * @package    tutorplus
 * @subpackage academic_period
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class academic_periodGeneratorHelper extends BaseAcademic_periodGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Academic Settings" => "academic_settings",
                "Academic Periods" => "academic_period"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "academic_periods"
        );
    }

}