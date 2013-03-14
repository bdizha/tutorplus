<?php

require_once dirname(__FILE__) . '/../lib/tpCourseAnnouncementGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpCourseAnnouncementGeneratorHelper.class.php';
/**
 * tpCourseAnnouncement actions.
 *
 * @package    tutorplus
 * @subpackage tpCourseAnnouncement
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCourseAnnouncementcAtions extends autoTpCourseAnnouncementActions
{

    public function preExecute()
    {
        parent::preExecute();

        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->course = CourseTable::getInstance()->find($courseId);

        $this->helper->setCourse($this->course);
        $this->forward404Unless($this->course, sprintf('Object Course does not exist (%s).', $courseId));
    }

    public function executeIndex(sfWebRequest $request)
    {
        $this->courseAnnouncements = AnnouncementTable::getInstance()->findByCourseId($this->course->getId());
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->forward404Unless($this->announcement = $this->getRoute()->getObject());
    }

    public function processUpdates($object = null, $values = null, sfWebRequest $request = null, $isNew = false)
    {
        // save a course announcement link
        $courseAnnouncement = new CourseAnnouncement();
        $courseAnnouncement->setCourse($this->course);
        $courseAnnouncement->setAnnouncement($object);
        $courseAnnouncement->save();
    }

}
