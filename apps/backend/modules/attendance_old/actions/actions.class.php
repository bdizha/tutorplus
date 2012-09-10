<?php

/**
 * attendance actions.
 *
 * @package    ecollegeplus
 * @subpackage attendance
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class attendanceActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	if($course_id = $this->getUser()->getMyAttribute('course_show_id', null))
  	{
    	$this->course_meeting_times = CourseMeetingTimeTable::getInstance()->findByCourse($course_id);  		  	
  	}
  	else
  	{
  		$this->redirect('@course');
  	}
  	
  	$this->forward404Unless($this->course = Doctrine_Core::getTable('Course')->find($course_id));
  }
  
	public function executeShow(sfWebRequest $request)
  {  	
  	if($course_id = $this->getUser()->getMyAttribute('course_show_id', null))
  	{
    	$this->course_meeting_times = CourseMeetingTimeTable::getInstance()->findByCourse($course_id);  		  	
  	}
  	else
  	{
  		$this->redirect('@course');
  	}
  	
  	$this->forward404Unless($this->course = Doctrine_Core::getTable('Course')->find($course_id));
  }
}
