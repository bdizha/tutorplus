<?php

/**
 * calendar_event module helper.
 *
 * @package    tutorplus
 * @subpackage calendar_event
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendar_eventGeneratorHelper extends BaseCalendar_eventGeneratorHelper {

    public function linkToManageAttendees($object, $params) {
        return '<input class="button" id="calendar_event_attendees" type="button" value="' . __($params['label'], array(), 'sf_admin') . '"/>';
    }
    
    public function linkToEvents($object, $params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/calendar/event\';" />';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "Events" => "calendar_event"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "calendar",
            "current_child" => "my_calendar",
            "current_link" => "calendar_events"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "Events" => "calendar_event",
                "New Event" => "calendar/event/new",
            )
        );
    }

    public function getNewLinks() {
        return array(
            "currentParent" => "calendar",
            "current_child" => "my_calendar",
            "current_link" => "calendar_events"
        );
    }

    public function getEditBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "Events" => "calendar_event",
                "Edit Event ~ " . $object->getName() => "calendar/event/" . $object->getId() . "/edit",
            )
        );
    }

    public function getEditLinks() {
        return array(
            "currentParent" => "calendar",
            "current_child" => "my_calendar",
            "current_link" => "calendar_events"
        );
    }

    public function getShowBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "Events" => "calendar_event",
                $object->getName() => "calendar/event/" . $object->getSlug(),
            )
        );
    }

    public function getShowLinks() {
        return array(
            "currentParent" => "calendar",
            "current_child" => "my_calendar",
            "current_link" => "calendar_events"
        );
    }

    public function myScheduleBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "My Schedules" => "calendar"
            )
        );
    }

    public function myScheduleLinks() {
        return array(
            "currentParent" => "dashboard",
            "current_child" => "my_calendar",
            "current_link" => "my_schedule"
        );
    }

}