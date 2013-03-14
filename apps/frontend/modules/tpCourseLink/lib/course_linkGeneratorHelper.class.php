<?php

/**
 * course_link module helper.
 *
 * @package    tutorplus
 * @subpackage course_link
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_linkGeneratorHelper extends BaseCourse_linkGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/course_link#", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/course_link#", array("popup_url" => "/course_link/" . $object->getId() . "/edit")) . '</li>';
    }

}