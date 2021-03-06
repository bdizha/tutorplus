<?php

require_once dirname(__FILE__) . '/../lib/tpCourseSyllabusGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpCourseSyllabusGeneratorHelper.class.php';
/**
 * tpCourseSyllabus actions.
 *
 * @package    tutorplus.org
 * @subpackage tpCourseSyllabus
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCourseSyllabusActions extends autoTpCourseSyllabusActions
{

    public function preExecute()
    {
        parent::preExecute();
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course_explorer");
        $this->course = Doctrine_Core::getTable('Course')->find(array($courseId));
        $this->forward404Unless($this->course, sprintf('Course does not exist (%s).', $courseId));
        $this->helper->setProfile($this->getUser()->getProfile());
        $this->helper->setCourse($this->course);
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->courseSyllabus = $this->getRoute()->getObject();
        $this->course = $this->courseSyllabus->getCourse();
        $courseSyllabus = CourseSyllabusTable::getInstance()->findOrCreateOneByCourse($this->course->getId());
        $this->helper->setCourseSyllabus($courseSyllabus);
        $this->forward404Unless($this->course);
    }

    public function executeIndex(sfWebRequest $request)
    {
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@my_courses");
        $courseSyllabus = CourseSyllabusTable::getInstance()->findOrCreateOneByCourse($courseId);
        $this->redirect("@course_syllabus_show?id=" . $courseSyllabus->getId());
    }

}
