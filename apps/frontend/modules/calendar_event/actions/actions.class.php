<?php

require_once dirname(__FILE__) . '/../lib/calendar_eventGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/calendar_eventGeneratorHelper.class.php';

/**
 * calendar_event actions.
 *
 * @package    tutorplus
 * @subpackage calendar_event
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendar_eventActions extends autoCalendar_eventActions {

    public function executeShow(sfWebRequest $request) {
        $this->calendarEvent = $this->getRoute()->getObject();
        $this->forward404Unless($this->calendarEvent);
        $this->getUser()->setMyAttribute('event_show_id', $this->calendarEvent->getId());
    }

    public function executeCalendarEvents(sfWebRequest $request) {
        if (isset($request["calendar"]) && is_array($request["calendar"])) {
            $calendarIds = $request["calendar"];
            $ids = array();

            foreach ($calendarIds["id"] as $key => $id) {
                if (!empty($id)) {
                    $ids[] = $id;
                }
            }

            $this->getUser()->setMyAttribute('calendar_ids', $ids);
        } else {
            $ids = $this->getUser()->getMyAttribute('calendar_ids', array());
        }

        echo json_encode($calendarEvents = CalendarEventTable::getInstance()->retrieveByProfileIdAndVisibility($this->getUser()->getId(), $ids));
        die;
    }

    public function executeEdit(sfWebRequest $request) {
        $this->calendar_event = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->calendar_event);

        $this->getUser()->setMyAttribute('event_show_id', $this->calendar_event->getId());
    }

}
