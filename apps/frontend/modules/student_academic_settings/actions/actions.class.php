<?php

require_once dirname(__FILE__).'/../lib/student_academic_settingsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/student_academic_settingsGeneratorHelper.class.php';

/**
 * student_academic_settings actions.
 *
 * @package    tutorplus
 * @subpackage student_academic_settings
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class student_academic_settingsActions extends autoStudent_academic_settingsActions
{
    public function preExecute()
    {
        $studentId = $this->getUser()->getMyAttribute('student_show_id', null);        
        $this->student = StudentTable::getInstance()->find($studentId);
        $this->redirectUnless($this->student, "@student");
        parent::preExecute();
    }

    public function executeIndex(sfWebRequest $request)
    {
        $this->redirect('@student_academic_settings_edit?id=' . $this->student->getId());
    }

    public function executeProgrammes(sfWebRequest $request)
    {
    }

    public function executeCourses(sfWebRequest $request)
    {
    }

    public function executeMailingLists(sfWebRequest $request)
    {
    }
}
