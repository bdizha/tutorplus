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
    
    public function linkToSend($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save email" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToSaveDraft($object, $params) {
        return '<input class="cancel email" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" />';
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