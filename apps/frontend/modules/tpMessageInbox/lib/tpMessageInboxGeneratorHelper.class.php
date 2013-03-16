<?php

/**
 * tpMessageInbox module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpMessageInbox
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpMessageInboxGeneratorHelper extends BaseTpMessageInboxGeneratorHelper
{

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Messaging" => "message_inbox",
                "Inbox" => "message_inbox"));
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "messaging",
            "current_child" => "my_messages",
            "current_link" => "message_inbox");
    }

}