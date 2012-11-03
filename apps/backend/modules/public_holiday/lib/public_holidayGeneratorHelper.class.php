<?php

/**
 * public_holiday module helper.
 *
 * @package    tutorplus
 * @subpackage public_holiday
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class public_holidayGeneratorHelper extends BasePublic_holidayGeneratorHelper
{
	public function linkToNew($params)
  {
    return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/public_holiday#", array()).'</li>';
  }

  public function linkToEdit($object, $params)
  {
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/public_holiday#", array("popup_url" => "/backend.php/public_holiday/".$object->getId()."/edit")).'</li>';
  }
}