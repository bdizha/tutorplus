<?php

require_once dirname(__FILE__) . '/../lib/course_meeting_timeGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/course_meeting_timeGeneratorHelper.class.php';

/**
 * course_meeting_time actions.
 *
 * @package    tutorplus
 * @subpackage course_meeting_time
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_meeting_timeActions extends autoCourse_meeting_timeActions {

    public function preExecute() {
        parent::preExecute();
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->course = CourseTable::getInstance()->find(array($courseId));

        $this->helper->setCourse($this->course);
        $this->forward404Unless($this->course, sprintf('Object Course does not exist (%s).', $courseId));
    }

}
