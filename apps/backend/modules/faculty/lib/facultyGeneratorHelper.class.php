<?php

/**
 * faculty module helper.
 *
 * @package    ecollegeplus
 * @subpackage faculty
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class facultyGeneratorHelper extends BaseFacultyGeneratorHelper {

    public function indexLinks() {
        return array("current_parent" => "settings", "current_child" => "academic_settings", "current_link" => "faculties");
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array("Faculties" => "faculty"));
    }

}
