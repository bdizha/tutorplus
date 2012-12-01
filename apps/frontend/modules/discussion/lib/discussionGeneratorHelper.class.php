<?php

/**
 * discussion module helper.
 *
 * @package    tutorplus
 * @subpackage discussion
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussionGeneratorHelper extends BaseDiscussionGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Discussions" => "discussion",
                "Discussion Explorer" => "discussion"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Discussions" => "discussion",
                "Discussion Explorer" => "discussion",
                "New Discussion" => "discussion/new"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Discussions" => "discussion",
                "Discussion Explorer" => "discussion",
                "Edit Discussion" => "discussion/" . $object->getId() . "/edit"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

    public function showBreadcrumbs($discussion) {
        return array('breadcrumbs' => array(
                "Discussions" => "discussion",
                "Discussion Explorer" => "discussion",
                $discussion->getName() => "discussion/" . $discussion->getSlug()
            )
        );
    }

    public function showLinks() {
        return array(
            "current_parent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

    public function linkToDiscussionTopicEdit($object, $params) {
        return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToDiscussionTopicDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'discussion_topic_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

}