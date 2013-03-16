<?php

/**
 * tpAcademicPeriod module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpAcademicPeriod
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpAcademicPeriodGeneratorHelper extends BaseTpAcademicPeriodGeneratorHelper
{

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Academic Settings" => "academic_settings",
                "Academic Periods" => "academic_period"
            )
        );
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "academic_periods"
        );
    }

}