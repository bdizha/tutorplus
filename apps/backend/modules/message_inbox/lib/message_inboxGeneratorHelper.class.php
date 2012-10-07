<?php

/**
 * message_inbox module helper.
 *
 * @package    ecollegeplus
 * @subpackage message_inbox
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_inboxGeneratorHelper extends BaseMessage_inboxGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_inbox#", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_inbox#", array("popup_url" => "/backend.php/message_inbox/" . $object->getId() . "/edit")) . '</li>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Messaging" => "message_inbox",
                "Inbox" => "message_inbox"));
    }

    public function indexLinks() {
        return array(
            "current_parent" => "messaging",
            "current_child" => "my_messages",
            "current_link" => "message_inbox");
    }

}