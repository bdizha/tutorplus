<?php

/**
 * course_meeting_time module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage course_meeting_time
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCourse_meeting_timeGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'course_meeting_time' : 'course_meeting_time_'.$action;
  }
}
