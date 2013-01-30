<?php

/**
 * discussion_comment module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_comment
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_commentGeneratorHelper extends BaseDiscussion_commentGeneratorHelper
{
    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/discussion_comment#", array()).'</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), "/discussion_comment#", array("popup_url" => "/discussion_comment/".$object->getId()."/edit")).'</li>';
    }

    public function linkToSave($object, $params)
    {
        return '<li class="sf_admin_action_save"><input type="button" value=" ' . __($params['label'], array(), 'sf_admin') . ' " class="save"></li>';
    }
}