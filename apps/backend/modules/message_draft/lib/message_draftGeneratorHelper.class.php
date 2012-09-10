<?php

/**
 * message_draft module helper.
 *
 * @package    ecollegeplus
 * @subpackage message_draft
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_draftGeneratorHelper extends BaseMessage_draftGeneratorHelper
{

    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_draft#", array()) . '</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_draft#", array("popup_url" => "/backend.php/message_draft/" . $object->getId() . "/edit")) . '</li>';
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
        return '<li class="sf_admin_action_save_and_add"><input id="link_to_save_and_add" type="button" value=" ' . __($params['label'], array(), 'sf_admin') . ' " class="save"></li>';
    }

    public function linkTo_saveDraft($object, $params)
    {
        return '<li class="sf_admin_action_save"><input class="save" id="message_save_'. $object->getId() .'" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkTo_send($object, $params)
    {
        return '<li class="sf_admin_action_save"><input class="save" id="message_send_'. $object->getId() .'" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkTo_cancel($object, $params)
    {
        return '<li class="sf_admin_action_save"><input class="save" id="message_cancel_'. $object->getId() .'" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }
}