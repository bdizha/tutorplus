<?php

/**
 * news module helper.
 *
 * @package    ecollegeplus
 * @subpackage news
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsGeneratorHelper extends BaseNewsGeneratorHelper
{
	public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/news#", array("class" => "new")) . '</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<a class="edit" href="/backend.php/news/' . $object->getId() . '/edit">&nbsp;</a>';
    }

    public function linkToDelete($object, $params)
    {
        return link_to(__('&nbsp;', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', "class" => "delete", 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm']));
    }

    public function linkToCancel($object, $params)
    {
        return '<input class="cancel" type="button" ' . '" onclick="document.location.href=\'/backend.php/news\'" value="Cancel"/>';
    }

    public function linkToDone($object, $params)
    {
        return '<input class="done" type="button" ' . '" onclick="document.location.href=\'/backend.php/news\'" value="Done"/>';
    }

    public function linkToSave($object, $params)
    {
        return '<li class="sf_admin_action_save"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

}