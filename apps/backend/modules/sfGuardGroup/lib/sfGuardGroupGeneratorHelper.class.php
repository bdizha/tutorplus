<?php

/**
 * sfGuardGroup module helper.
 *
 * @package    tutorplus
 * @subpackage sfGuardGroup
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardGroupGeneratorHelper extends BaseSfGuardGroupGeneratorHelper
{
    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/sfGuardGroup#", array()).'</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/sfGuardGroup#", array("popup_url" => "/backend.php/sfGuardGroup/".$object->getId()."/edit")).'</li>';
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