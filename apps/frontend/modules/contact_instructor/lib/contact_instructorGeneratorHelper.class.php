<?php

/**
 * contact_instructor module helper.
 *
 * @package    tutorplus
 * @subpackage contact_instructor
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contact_instructorGeneratorHelper extends BaseContact_instructorGeneratorHelper
{

    public function getUrlForAction($action)
    {
        return 'list' == $action ? 'instructor' : 'contact_instructor_' . $action;
    }

    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/contact_instructor#", array()) . '</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/contact_instructor#", array("popup_url" => "/contact_instructor/" . $object->getId() . "/edit")) . '</li>';
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
        return '<li class="sf_admin_action_new"><div class="button" id="link_to_save_and_add" url="/contact_instructor#">' . __($params['label'], array(), 'sf_admin') . '</div></li>';
    }

}