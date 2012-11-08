<?php

/**
 * calendar_event_attendee module helper.
 *
 * @package    tutorplus
 * @subpackage calendar_event_attendee
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendar_event_attendeeGeneratorHelper extends BaseCalendar_event_attendeeGeneratorHelper
{
	public function linkToNew($params)
  {
    return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/calendar_event_attendee#", array()).'</li>';
  }

  public function linkToEdit($object, $params)
  {
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), "/calendar_event_attendee#", array("popup_url" => "/calendar_event_attendee/".$object->getId()."/edit")).'</li>';
  }
}