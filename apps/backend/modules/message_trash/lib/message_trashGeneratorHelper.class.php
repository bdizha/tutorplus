<?php

/**
 * message_trash module helper.
 *
 * @package    ecollegeplus
 * @subpackage message_trash
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_trashGeneratorHelper extends BaseMessage_trashGeneratorHelper
{
	public function linkToNew($params)
  {
    return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_trash#", array()).'</li>';
  }

  public function linkToEdit($object, $params)
  {
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_trash#", array("popup_url" => "/backend.php/message_trash/".$object->getId()."/edit")).'</li>';
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