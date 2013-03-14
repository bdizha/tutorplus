<?php

require_once dirname(__FILE__) . '/../lib/tpProgramLevelGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpProgramLevelGeneratorHelper.class.php';
/**
 * tpProgramLevel actions.
 *
 * @package    tutorplus.org
 * @subpackage tpProgramLevel
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProgramLevelActions extends autoTpProgramLevelActions
{

    public function indexBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Academic Settings" => "academic_settings",
                "Programmes" => "program"
            )
        );
    }

    public function indexLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "programmes",
            "is_profile" => true
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Communication Settings" => "academic_settings",
                "Programmes" => "program"
            )
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "programmes",
            "is_profile" => true
        );
    }

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Academic Settings" => "academic_settings",
                "Programmes" => "program"
            )
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "programmes",
            "is_profile" => true
        );
    }

}
