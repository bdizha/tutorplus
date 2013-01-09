<?php

/**
 * program_level module helper.
 *
 * @package    tutorplus.org
 * @subpackage program_level
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class program_levelGeneratorHelper extends BaseProgram_levelGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Academic Settings" => "academic_settings",
                "Program Leves" => "program_level"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "program_levels"
        );
    }

}