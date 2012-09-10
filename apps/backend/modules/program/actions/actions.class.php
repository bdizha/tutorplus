<?php

require_once dirname(__FILE__) . '/../lib/programGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/programGeneratorHelper.class.php';

/**
 * program actions.
 *
 * @package    ecollegeplus
 * @subpackage program
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class programActions extends autoProgramActions
{

    public function executeChooseOld(sfWebRequest $request)
    {
        $student_id = $this->getUser()->getMyAttribute('student_show_id', null);
        $programmes = ProgramTable::getInstance()->findByDepartmentId($request['d'])
            ->toKeyValueArray('id', 'name');

        $this->programes_list = array();
        $this->current_programmes_keys = array();
        
        $this->programes_list = $this->getCurrentStudentProgrammes($student_id);

        foreach ($programmes as $key => $program)
        {
            if (!in_array($key, $this->current_programmes_keys))
            {
                $this->programes_list[] = array(
                    "id" => $key,
                    "name" => $program
                );
            }
        }
    }    

    public function executeChoose(sfWebRequest $request)
    {
        $this->module = $request->getParameter("module_name");
        $this->objectId = $request->getParameter("object_id");

        // fetch all programmes for now
        $this->programmes = ProgramTable::getInstance()->findAll();
        $this->currentProgramIds = array();

        if ($request->getMethod() == "POST")
        {
            $notice = 'The programme(s) were added successfully.';
            try
            {
                $programmes = $request->getParameter('programmes');

                // save programmes
                $this->currentProgramIds = $this->saveOrGetObjectProgrammes($programmes, $this->module, $this->objectId);

                // send new programmes subscription
            }
            catch (Doctrine_Validator_Exception $e)
            {
                $this->getUser()->setFlash('error', 'The programme(s) have not been added due to some errors.', false);
            }

            $this->getUser()->setFlash('notice', $notice, false);
        }
        else
        {
            // fetch the current programmes
            $this->currentProgramIds = $this->saveOrGetObjectProgrammes(null, $this->module, $this->objectId);
        }
    }

    protected function saveOrGetObjectProgrammes($postedProgramIds = null, $module, $objectId)
    {
        if ($module == ProgramTable::MODULE_STUDENT)
        {
            // fetch current programmes by student id
            $currentProgramIds = array_keys(StudentTable::getInstance()->find($objectId)->getProgrammes());

            if (!$postedProgramIds)
            {
                return $currentProgramIds;
            }

            $toDelete = array_diff($currentProgramIds, $postedProgramIds);
            if (count($toDelete))
            {
                StudentProgramTable::getInstance()->deleteByProgramIdsAndStudentId($toDelete, $objectId);
            }

            $toAdd = array_diff($postedProgramIds, $currentProgramIds);
            if (count($toAdd))
            {
                foreach ($toAdd as $programId)
                {
                    $studentProgram = new StudentProgram();
                    $studentProgram->setStudentId($objectId);
                    $studentProgram->setProgramId($programId);
                    $studentProgram->save();
                }
            }
        }
        elseif ($module == ProgramTable::MODULE_MAILING_LIST)
        {
            // hold on for now
        }

        return $postedProgramIds;
    }
}
