<?php

/**
 * calendar_event module helper.
 *
 * @package    ecollegeplus
 * @subpackage calendar_event
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendar_eventGeneratorHelper extends BaseCalendar_eventGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/calendar_event/new", array("class" => "new")) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/calendar_event/" . $object->getId() . "/edit") . '</li>';
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/backend.php/calendar_event\'"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/backend.php/calendar_event\'"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="submit" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "Calendar Events" => "calendar_event"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "dashboard",
            "current_child" => "my_calendar",
            "current_link" => "calendar_events"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "Calendar Events" => "calendar_event",
                "New Calendar Event" => "calendar_event/new",
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "dashboard",
            "current_child" => "my_calendar",
            "current_link" => "calendar_events",
            "is_profile" => true
        );
    }

    public function editBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "Calendar Events" => "calendar_event",
                "Edit Calendar Event" => "calendar_event/new",
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "dashboard",
            "current_child" => "my_calendar",
            "current_link" => "calendar_events",
            "is_profile" => true
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
            "current_parent" => "dashboard",
            "current_child" => "my_calendar",
            "current_link" => "my_schedule"
        );
    }

}