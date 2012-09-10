<?php

/**
 * message_sent module helper.
 *
 * @package    ecollegeplus
 * @subpackage message_sent
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_sentGeneratorHelper extends BaseMessage_sentGeneratorHelper
{
	public function linkToNew($params)
  {
    return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_sent#", array()).'</li>';
  }

  public function linkToEdit($object, $params)
  {
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_sent#", array("popup_url" => "/backend.php/message_sent/".$object->getId()."/edit")).'</li>';
  }
  
	public function linkToSave($object, $params)
  {
    return '<li class="sf_admin_action_save"><input class="save" type="button" value="'.__($params['label'], array(), 'sf_admin').'" /></li>';
  }
  
	public function linkToSaveAndAdd($object, $params)
  {
    if (!$object->isNew())
    {
      return '';
    }

    return '<li class="sf_admin_action_save_and_add"><input class="save" type="button" value="'.__($params['label'], array(), 'sf_admin').'" name="_save_and_add" /></li>';
  }
}