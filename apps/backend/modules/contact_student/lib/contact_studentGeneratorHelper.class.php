<?php

/**
 * contact_student2 module helper.
 *
 * @package    ecollegeplus
 * @subpackage contact_student2
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contact_studentGeneratorHelper extends BaseContact_studentGeneratorHelper
{

    public function getUrlForAction($action)
    {
        return 'list' == $action ? 'student' : 'contact_student_' . $action;
    }

    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/contact_student2#", array()) . '</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/contact_student2#", array("popup_url" => "/backend.php/contact_student2/" . $object->getId() . "/edit")) . '</li>';
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
        return '<li class="sf_admin_action_new"><div class="button" id="link_to_save_and_add" url="/backend.php/contact_student2#">' . __($params['label'], array(), 'sf_admin') . '</div></li>';
    }

}