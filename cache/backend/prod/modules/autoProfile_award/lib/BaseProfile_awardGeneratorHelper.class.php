<?php

/**
 * profile_award module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage profile_award
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfile_awardGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'profile_award' : 'profile_award_'.$action;
  }
}
