<?php

/**
 * message_draft module helper.
 *
 * @package    tutorplus
 * @subpackage message_draft
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_draftGeneratorHelper extends BaseMessage_draftGeneratorHelper {

    public function linkToSend($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save email" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToSaveDraft($object, $params) {
        return '<input class="cancel email" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" />';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Messaging" => "message_inbox",
                "Drafts" => "message_draft"));
    }

    public function indexLinks() {
        return array(
            "currentParent" => "messaging",
            "current_child" => "my_messages",
            "current_link" => "message_draft");
    }

}