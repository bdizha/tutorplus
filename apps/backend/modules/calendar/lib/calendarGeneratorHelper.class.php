<?php

/**
 * calendar module helper.
 *
 * @package    ecollegeplus
 * @subpackage calendar
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendarGeneratorHelper extends BaseCalendarGeneratorHelper
{
	public function linkToNew($params)
  {
    return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/calendar#", array()).'</li>';
  }

  public function linkToEdit($object, $params)
  {
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/calendar#", array("popup_url" => "/backend.php/calendar/".$object->getId()."/edit")).'</li>';
  }
}