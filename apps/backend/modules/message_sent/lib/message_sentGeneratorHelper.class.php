<?php

/**
 * message_sent module helper.
 *
 * @package    ecollegeplus
 * @subpackage message_sent
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_sentGeneratorHelper extends BaseMessage_sentGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_sent#", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/message_sent#", array("popup_url" => "/backend.php/message_sent/" . $object->getId() . "/edit")) . '</li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Messaging" => "message_inbox",
                "Sent" => "message_sent"));
    }

    public function indexLinks() {
        return array(
            "current_parent" => "messaging",
            "current_child" => "my_messages",
            "current_link" => "message_sent");
    }

}