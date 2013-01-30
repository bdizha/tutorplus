<?php

/**
 * discussion_post module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_post
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_postGeneratorHelper extends BaseDiscussion_postGeneratorHelper {

    public function linkToDiscussionPostEdit($object, $params) {
        return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/message/" . $object->getId() . "/edit", array("class" => "button-edit", "id" => $object->getId()));
    }

}