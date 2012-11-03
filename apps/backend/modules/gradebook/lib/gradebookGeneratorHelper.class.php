<?php

/**
 * gradebook module helper.
 *
 * @package    tutorplus
 * @subpackage gradebook
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gradebookGeneratorHelper extends BaseGradebookGeneratorHelper
{

    public function linkToNew($params)
    {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/gradebook#", array()) . '</li>';
    }

    public function linkToEdit($object, $params)
    {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/gradebook#", array("popup_url" => "/backend.php/gradebook/" . $object->getId() . "/edit")) . '</li>';
    }

}