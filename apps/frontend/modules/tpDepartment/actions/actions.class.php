<?php

require_once dirname(__FILE__) . '/../lib/tpDepartmentGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpDepartmentGeneratorHelper.class.php';

/**
 * department actions.
 *
 * @package    tutorplus
 * @subpackage department
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpDepartmentActions extends autoTpDepartmentActions
{

    public function executeChoose(sfWebRequest $request)
    {
        $departments = DepartmentTable::getInstance()->findBy("faculty_id", $request['f'])
            ->toKeyValueArray('id', 'name');

        $this->departments = array(array("id" => "", "name" => "-- Department --"));

        foreach ($departments as $key => $department)
        {
            $this->departments[] = array(
                "id" => $key,
                "name" => $department);
        }
        return $this->renderText(json_encode($this->departments));
    }

}
