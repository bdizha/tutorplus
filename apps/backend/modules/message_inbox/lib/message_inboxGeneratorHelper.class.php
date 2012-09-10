<?php

/**
 * message_inbox module helper.
 *
 * @package    ecollegeplus
 * @subpackage message_inbox
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_inboxGeneratorHelper extends BaseMessage_inboxGeneratorHelper
{

    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_inbox#", array()) . '</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_inbox#", array("popup_url" => "/backend.php/message_inbox/" . $object->getId() . "/edit")) . '</li>';
    }

    public function linkToSave($object, $params)
    {
        return '<li class="sf_admin_action_save"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToSaveAndAdd($object, $params)
    {
        if (!$object->isNew())
        {
            return '';
        }

        return '<li class="sf_admin_action_save_and_add"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" name="_save_and_add" /></li>';
    }

    public function linkTo_saveDraft($object, $params)
    {
        return '<input class="save" id="' . __($params['label'], array(), 'sf_admin') . '" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" />';
    }

    public function linkTo_send($object, $params)
    {
        return '<input class="save" id="' . __($params['label'], array(), 'sf_admin') . '" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" />';
    }

    public function linkTo_cancel($object, $params)
    {
        return '<input class="save" id="' . __($params['label'], array(), 'sf_admin') . '" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" />';
    }

}