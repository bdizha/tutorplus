<?php

/**
 * gradebook_scale module helper.
 *
 * @package    ecollegeplus
 * @subpackage gradebook_scale
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gradebook_scaleGeneratorHelper extends BaseGradebook_scaleGeneratorHelper
{

    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new"><input class="new" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/gradebook_scale#", array("popup_url" => "/backend.php/gradebook_scale/" . $object->getId() . "/edit")) . '</li>';
    }

    public function linkToDelete($object, $params, $is_form_action = false)
    {
        if ($object->isNew())
        {
            return '';
        }

        if (!$is_form_action)
        {
            return '<li class="sf_admin_action_delete">' . link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
        else
        {
            return '<li class="sf_admin_form_action_delete">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/gradebook_scale#", array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToCancel($object, $params)
    {
        return '<input class="cancel" type="button" ' . '" value="Cancel"/>';
    }

    public function linkToDone($object, $params)
    {
        return '<input class="done" type="button" ' . '" value="Done"/>';
    }

    public function linkToSave($object, $params)
    {
        return '<li class="sf_admin_action_save"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToManageGrades($params)
    {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/backend.php/gradebook/grades\';return false"/>';
    }

}