<?php

require_once dirname(__FILE__) . '/../lib/instructor_academic_settingsGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/instructor_academic_settingsGeneratorHelper.class.php';

/**
 * instructor_academic_settings actions.
 *
 * @package    ecollegeplus
 * @subpackage instructor_academic_settings
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class instructor_academic_settingsActions extends autoInstructor_academic_settingsActions
{

    public function preExecute()
    {
        $instructorId = $this->getUser()->getMyAttribute('instructor_show_id', null);
        $this->instructor = InstructorTable::getInstance()->find($instructorId);
        $this->redirectUnless($this->instructor, "@instructor");
        parent::preExecute();
    }

    public function executeIndex(sfWebRequest $request)
    {
        $this->redirect('@instructor_academic_settings_edit?id=' . $this->instructor->getId());
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

