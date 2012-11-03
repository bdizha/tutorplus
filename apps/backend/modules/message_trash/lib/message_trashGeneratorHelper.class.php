<?php

/**
 * message_trash module helper.
 *
 * @package    tutorplus
 * @subpackage message_trash
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_trashGeneratorHelper extends BaseMessage_trashGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_trash#", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_trash#", array("popup_url" => "/backend.php/message_trash/" . $object->getId() . "/edit")) . '</li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Messaging" => "message_inbox",
                "Trash" => "message_trash"));
    }

    public function indexLinks() {
        return array(
            "current_parent" => "messaging",
            "current_child" => "my_messages",
            "current_link" => "message_trash");
    }

}