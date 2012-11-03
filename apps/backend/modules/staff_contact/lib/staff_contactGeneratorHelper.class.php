<?php

/**
 * staff_contact module helper.
 *
 * @package    tutorplus
 * @subpackage staff_contact
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staff_contactGeneratorHelper extends BaseStaff_contactGeneratorHelper
{

    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">'.button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/staff_contact", array()).'</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">'.link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/staff_contact", array("popup_url" => "/backend.php/staff_contact/".$object->getId()."/edit")).'</li>';
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
            return '<li class="sf_admin_action_delete">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkTo_done($object, $params)
    {
        return '<li class="sf_admin_action_done">' . link_to(__($params['label'], array(), 'sf_admin'), $params['redirect_url'], array("popup_url" => "/backend.php/staff_contact" . $object->getId() . "/edit")) . '</li>';
    }

}