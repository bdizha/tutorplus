<?php

/**
 * course_reading_item module helper.
 *
 * @package    ecollegeplus
 * @subpackage course_reading_item
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_reading_itemGeneratorHelper extends BaseCourse_reading_itemGeneratorHelper
{
	public function linkToNew($params)
  {
    return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/course_reading_item#", array()).'</li>';
  }

  public function linkToEdit($object, $params)
  {
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/course_reading_item#", array("popup_url" => "/backend.php/course_reading_item/".$object->getId()."/edit")).'</li>';
  }
}