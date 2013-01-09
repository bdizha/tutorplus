<?php

/**
 * department module helper.
 *
 * @package    tutorplus
 * @subpackage department
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class departmentGeneratorHelper extends BaseDepartmentGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Academic Settings" => "academic_settings",
                "Departments" => "department"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "departments"
        );
    }
}
