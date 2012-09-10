<?php

/**
 * notification_settings module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage notification_settings
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNotification_settingsGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'notification_settings' : 'notification_settings_'.$action;
  }
}
