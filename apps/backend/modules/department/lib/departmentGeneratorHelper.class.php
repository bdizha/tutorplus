<?php

/**
 * department module helper.
 *
 * @package    ecollegeplus
 * @subpackage department
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class departmentGeneratorHelper extends BaseDepartmentGeneratorHelper {

    public function indexLinks() {
        return array("current_parent" => "settings", "current_child" => "academic_settings", "current_link" => "departments");
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array("Departments" => "department"));
    }

}
