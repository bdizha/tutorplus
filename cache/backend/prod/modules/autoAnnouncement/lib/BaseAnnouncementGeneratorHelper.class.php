<?php

/**
 * announcement module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage announcement
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAnnouncementGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'announcement' : 'announcement_'.$action;
  }
}
