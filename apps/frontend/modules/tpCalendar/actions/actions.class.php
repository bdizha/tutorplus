<?php

require_once dirname(__FILE__) . '/../lib/tpCalendarGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpCalendarGeneratorHelper.class.php';

/**
 * tpCalendar actions.
 *
 * @package    tutorplus
 * @subpackage tpCalendar
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCalendarActions extends autoTpCalendarActions
{       
    public function executeMySchedule(sfWebRequest $request)
    {        
        $ids = array();
        $calendarIds = CalendarTable::getInstance()->retrieveByIdsProfileIdAndVisibility($this->getUser()->getId());
        
        foreach($calendarIds as $key => $calendarId)
        {
            $ids[] = $calendarId["id"];
        }
        
        $this->getUser()->setMyAttribute('calendar_ids', array_values($ids));
    }
}
