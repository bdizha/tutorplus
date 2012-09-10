<?php

require_once dirname(__FILE__) . '/../lib/calendarGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/calendarGeneratorHelper.class.php';

/**
 * calendar actions.
 *
 * @package    ecollegeplus
 * @subpackage calendar
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendarActions extends autoCalendarActions
{
    public function executeMyCalendar(sfWebRequest $request)
    {        
        $ids = array();
        $calendar_ids = CalendarTable::getInstance()->retrieveByIdsUserIdAndVisibility($this->getUser()->getId());
        
        foreach($calendar_ids as $key => $calendar_id)
        {
            $ids[] = $calendar_id["id"];
        }
        
        $this->getUser()->setMyAttribute('calendar_ids', array_values($ids));
    }
}
