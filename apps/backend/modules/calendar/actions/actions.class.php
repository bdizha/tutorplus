<?php

require_once dirname(__FILE__) . '/../lib/calendarGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/calendarGeneratorHelper.class.php';

/**
 * calendar actions.
 *
 * @package    tutorplus
 * @subpackage calendar
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendarActions extends autoCalendarActions
{
    public function executeMySchedule(sfWebRequest $request)
    {        
        $ids = array();
        $calendarIds = CalendarTable::getInstance()->retrieveByIdsUserIdAndVisibility($this->getUser()->getId());
        
        foreach($calendarIds as $key => $calendarId)
        {
            $ids[] = $calendarId["id"];
        }
        
        $this->getUser()->setMyAttribute('calendar_ids', array_values($ids));
    }
}
