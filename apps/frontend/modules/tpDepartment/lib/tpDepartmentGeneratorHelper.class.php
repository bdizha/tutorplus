<?php

/**
 * tpDepartment module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpDepartment
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpDepartmentGeneratorHelper extends BaseTpDepartmentGeneratorHelper
{

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Academic Settings" => "academic_settings",
                "Departments" => "department"
            )
        );
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "departments"
        );
    }

}