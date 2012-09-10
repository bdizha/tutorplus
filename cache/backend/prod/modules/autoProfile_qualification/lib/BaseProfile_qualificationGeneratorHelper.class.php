<?php

/**
 * profile_qualification module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage profile_qualification
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfile_qualificationGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'profile_qualification' : 'profile_qualification_'.$action;
  }
}
