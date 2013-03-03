<?php

require_once dirname(__FILE__) . '/../lib/course_syllabusGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/course_syllabusGeneratorHelper.class.php';

/**
 * course_syllabus actions.
 *
 * @package    tutorplus.org
 * @subpackage course_syllabus
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_syllabusActions extends autoCourse_syllabusActions {

    public function preExecute()
    {
        parent::preExecute();
        $this->helper->setProfile($this->getUser()->getProfile());
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->courseSyllabus = $this->getRoute()->getObject();
        $this->course = $this->courseSyllabus->getCourse();
        $this->forward404Unless($this->course);
    }

}
