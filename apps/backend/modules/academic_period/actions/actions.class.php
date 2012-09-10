<?php

require_once dirname(__FILE__).'/../lib/academic_periodGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/academic_periodGeneratorHelper.class.php';

/**
 * academic_period actions.
 *
 * @package    ecollegeplus
 * @subpackage academic_period
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class academic_periodActions extends autoAcademic_periodActions
{
	public function executeShow(sfWebRequest $request)
  {
    $this->academic_period = $this->getRoute()->getObject();
    $this->forward404Unless($this->academic_period);
    
    $this->course_meeting_times = CourseMeetingTimeTable::getInstance()->findByCourse(1);
    $this->course_links = CourseLinkTable::getInstance()->findByCourse(1);
    
    /*echo "<pre>";    
    print_r($this->course_meeting_times);die("</pre>");*/
  }	
}
