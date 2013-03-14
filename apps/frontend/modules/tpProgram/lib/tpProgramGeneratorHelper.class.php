<?php

/**
 * tpProgram module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpProgram
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProgramGeneratorHelper extends BaseTpProgramGeneratorHelper
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