<?php

/**
 * tpCalendar module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpCalendar
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCalendarGeneratorHelper extends BaseTpCalendarGeneratorHelper
{

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "Calendars" => "calendar"
            )
        );
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "calendar",
            "current_child" => "my_calendar",
            "current_link" => "calendars"
        );
    }

    public function myScheduleBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Calendar" => "calendar",
                "My Schedule" => "calendar"
            )
        );
    }

    public function myScheduleLinks()
    {
        return array(
            "currentParent" => "calendar",
            "current_child" => "my_calendar",
            "current_link" => "my_schedule"
        );
    }

}