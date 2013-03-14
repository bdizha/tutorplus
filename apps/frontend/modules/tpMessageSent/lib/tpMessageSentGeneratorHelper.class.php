<?php

/**
 * tpMessageSent module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpMessageSent
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpMessageSentGeneratorHelper extends BaseTpMessageSentGeneratorHelper
{

    public function indexBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Messaging" => "message_inbox",
                "Sent" => "message_sent"));
    }

    public function indexLinks()
    {
        return array(
            "currentParent" => "messaging",
            "current_child" => "my_messages",
            "current_link" => "message_sent");
    }

}