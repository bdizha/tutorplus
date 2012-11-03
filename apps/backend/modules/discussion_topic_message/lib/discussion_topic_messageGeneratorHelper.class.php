<?php

/**
 * discussion_topic_message module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_topic_message
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topic_messageGeneratorHelper extends BaseDiscussion_topic_messageGeneratorHelper
{
    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/discussion_topic_message", array()).'</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">'.link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/discussion_topic_message#", array("popup_url" => "/backend.php/discussion_topic_message/".$object->getId()."/edit")).'</li>';
    }

    public function linkToDelete($object, $params, $is_form_action = false)
    {
        if ($object->isNew())
        {
            return '';
        }

        if (!$is_form_action)
        {
            return '<li class="sf_admin_action_delete">'.link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
        else
        {
            return '<li class="sf_admin_form_action_delete">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToSave($object, $params)
    {
        return '<li testing="testing" class="sf_admin_action_save"><input type="button" value="Send" class="save"></li>';
    }

    public function linkToSaveAndAdd($object, $params)
    {
        if (!$object->isNew())
        {
            return '';
        }
        return '<li class="sf_admin_action_save_and_add"><input id="link_to_save_and_add" type="button" value=" ' . __($params['label'], array(), 'sf_admin') . ' " class="save"></li>';
    }

    public function linkToCancel($object, $params)
    {
        return '<input class="cancel" type="button" onclick="document.location.href=\'/backend.php/discussion_topic_message\' value="Cancel"/>';
    }

    public function linkToDone($object, $params)
    {
        return '<input class="cancel" type="button" onclick="document.location.href=\'/backend.php/discussion_topic_message\' value="Cancel"/>';
    }
}