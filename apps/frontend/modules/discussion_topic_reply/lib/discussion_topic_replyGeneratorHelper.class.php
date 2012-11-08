<?php

/**
 * discussion_topic_reply module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_topic_reply
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topic_replyGeneratorHelper extends BaseDiscussion_topic_replyGeneratorHelper
{
    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/discussion_topic_reply#", array()).'</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), "/discussion_topic_reply#", array("popup_url" => "/discussion_topic_reply/".$object->getId()."/edit")).'</li>';
    }

    public function linkToSave($object, $params)
    {
        return '<li class="sf_admin_action_save"><input type="button" value=" ' . __($params['label'], array(), 'sf_admin') . ' " class="save"></li>';
    }

    public function linkToSaveAndAdd($object, $params)
    {
        if (!$object->isNew())
        {
            return '';
        }
        return '<li class="sf_admin_action_save_andn_add"><input id="link_to_save_and_add" type="button" value=" ' . __($params['label'], array(), 'sf_admin') . ' " class="save"></li>';
    }
}