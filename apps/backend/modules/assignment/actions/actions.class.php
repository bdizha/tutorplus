<?php

require_once dirname(__FILE__) . '/../lib/assignmentGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/assignmentGeneratorHelper.class.php';

/**
 * assignment actions.
 *
 * @package    ecollegeplus
 * @subpackage assignment
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assignmentActions extends autoAssignmentActions {

    public function preExecute() {
        if (!$courseId = $this->getUser()->getMyAttribute('course_show_id', null)) {
            $this->redirect("@course");
        }
        $this->forward404Unless($this->course = Doctrine_Core::getTable('Course')->find(array($courseId)), sprintf('Object Course does not exist (%s).', $courseId));
        parent::preExecute();
    }

    public function executeShow(sfWebRequest $request) {
        $this->assignment = $this->getRoute()->getObject();
        $this->forward404Unless($this->assignment);

        $this->getUser()->setMyAttribute('assignment_show_id', $this->assignment->getId());
    }

    public function executeEdit(sfWebRequest $request) {
        $this->assignment = $this->getRoute()->getObject();
        $this->getUser()->setMyAttribute('assignment_show_id', $this->assignment->getId());
        $this->form = $this->configuration->getForm($this->assignment);
    }

    public function executeDetail(sfWebRequest $request) {
        if ($courseId = $this->getUser()->getMyAttribute('course_show_id', null)) {
            $this->course_meeting_times = CourseMeetingTimeTable::getInstance()->findByCourse($courseId);
        } else {
            $this->redirect('@course');
        }

        $this->forward404Unless($this->course = Doctrine_Core::getTable('Course')->find($courseId));

        if ($assignmentId = $this->getUser()->getMyAttribute('assignment_show_id', null)) {
            // load grades here
        } else {
            die("A null assignment (id) has been encountered...");
        }

        $this->forward404Unless($this->assignment = Doctrine_Core::getTable('Assignment')->find($assignmentId));
    }

    public function executeMyCourse(sfWebRequest $request) {
        if ($courseId = $this->getUser()->getMyAttribute('course_show_id', null)) {
            $this->redirect('@course_show?id=' . $courseId);
        } else {
            $this->redirect('@course');
        }
    }

}
