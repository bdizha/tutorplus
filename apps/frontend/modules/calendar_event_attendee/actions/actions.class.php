<?php

require_once dirname(__FILE__) . '/../lib/calendar_event_attendeeGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/calendar_event_attendeeGeneratorHelper.class.php';

/**
 * calendar_event_attendee actions.
 *
 * @package    tutorplus
 * @subpackage calendar_event_attendee
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendar_event_attendeeActions extends autoCalendar_event_attendeeActions {

    public function preExecute() {
        $this->redirectUnless($eventId = $this->getUser()->getMyAttribute('event_show_id', null), "@calendar_event");
        $this->forward404Unless($this->event = Doctrine_Core::getTable('CalendarEvent')->find(array($eventId)), sprintf('Object Event does not exist (%s).', $eventId));
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        
    }

    /**
     * Executes choose attendees action
     *
     * @param sfRequest $request A request object
     */
    public function executeChoose(sfWebRequest $request) {
        $this->currentProfileIds = array();

        // fetch all students for now
        $this->users = ProfileTable::getInstance()->findAll();

        //myToolkit::debug($this->event->toArray());
        // look for the current course students
        $currentCourseStudents = CalendarEventAttendeeTable::getInstance()->findByCalendarEventId($this->event->getId());

        foreach ($currentCourseStudents as $currentCourseStudent) {
            $this->currentProfileIds[] = $currentCourseStudent->getProfileId();
        }

        $profileIds = $request->getParameter("attendee", array());
        if ($request->getMethod() == "POST") {
            $toDelete = array_diff($this->currentProfileIds, $profileIds);
            if (count($toDelete)) {
                CalendarEventAttendeeTable::getInstance()->deleteByEventIdAndProfileIds($this->event->getId(), array_values($toDelete));
            }

            $toAdd = array_diff($profileIds, $this->currentProfileIds);
            if (count($toAdd)) {
                foreach ($toAdd as $profileId) {
                    $calendarEventAttendee = new CalendarEventAttendee();
                    $calendarEventAttendee->setProfileId($profileId);
                    $calendarEventAttendee->setCalendarEventId($this->event->getId());
                    $calendarEventAttendee->setComment("Invited");
                    $calendarEventAttendee->save();
                }

                $notice = 'The attendees were added successfully.';
                $this->getUser()->setFlash('notice', $notice, false);
            }

            $this->currentProfileIds = $profileIds;
        }
    }

    /**
     * Executes attendees action
     *
     * @param sfRequest $request A request object
     */
    public function executeAttendees(sfWebRequest $request) {
        
    }

}
