<?php

/**
 * discussion_topic_message module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_topic_message
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topic_messageGeneratorHelper extends BaseDiscussion_topic_messageGeneratorHelper {

    public function linkToDiscussionPostEdit($object, $params) {
        return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/message/" . $object->getId() . "/edit", array("class" => "button-edit", "id" => $object->getId()));
    }

}