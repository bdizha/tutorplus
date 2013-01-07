<?php

/**
 * institution module helper.
 *
 * @package    tutorplus.org
 * @subpackage institution
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class institutionGeneratorHelper extends BaseInstitutionGeneratorHelper {

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
            "current_parent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "institutions"
        );
    }

}