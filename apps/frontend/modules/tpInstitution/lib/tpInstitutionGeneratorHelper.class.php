<?php

/**
 * tpInstitution module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpInstitution
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpInstitutionGeneratorHelper extends BaseTpInstitutionGeneratorHelper
{
    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Academic Settings" => "academic_settings",
                "Institutions" => "institution"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "institutions"
        );
    }
}