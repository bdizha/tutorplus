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

    public function indexLinks() {
        return array("current_parent" => "settings", "current_child" => "academic_settings", "current_link" => "program_levels");
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array("Program Levels" => "program/level"));
    }

}