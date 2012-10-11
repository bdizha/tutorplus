<?php

/**
 * calendar module helper.
 *
 * @package    ecollegeplus
 * @subpackage calendar
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendarGeneratorHelper extends BaseCalendarGeneratorHelper {
    
    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "Calendars" => "calendar"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "calendar",
            "current_child" => "my_calendar",
            "current_link" => "calendars"
        );
    }

    public function myScheduleBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "My Schedule" => "calendar"
            )
        );
    }

    public function myScheduleLinks() {
        return array(
            "current_parent" => "calendar",
            "current_child" => "my_calendar",
            "current_link" => "my_schedule"
        );
    }
}