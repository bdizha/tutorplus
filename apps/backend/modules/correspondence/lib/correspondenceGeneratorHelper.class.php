<?php

/**
 * correspondence module helper.
 *
 * @package    ecollegeplus
 * @subpackage correspondence
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class correspondenceGeneratorHelper extends BaseCorrespondenceGeneratorHelper
{
	public function linkToNew($params)
  {
    return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/correspondence#", array()).'</li>';
  }

  public function linkToEdit($object, $params)
  {
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/correspondence#", array("popup_url" => "/backend.php/correspondence/".$object->getId()."/edit")).'</li>';
  }
}