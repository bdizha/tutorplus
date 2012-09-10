<?php

/**
 * student_contact module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage student_contact
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseStudent_contactGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'student_contact' : 'student_contact_'.$action;
  }
}
