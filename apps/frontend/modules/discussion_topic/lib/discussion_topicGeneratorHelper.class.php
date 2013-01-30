<?php

/**
 * discussion_topic module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_topic
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topicGeneratorHelper extends Basediscussion_topicGeneratorHelper {

  public function linkToShow($object, $params) {
    if (!is_null($object->getId())) {
      return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/discussion/group/" . $object->getId(), array()) . '</li>';
    }
  }

  public function linkToMyDiscussionGroup($object, $params) {
    return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/discussion/group/' . $object->getDiscussionGroupId() . '\';return false"/>';
  }

  public function linkToManageMembers($params) {
    return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/discussion/peer\';return false"/>';
  }

  public function courseBreadcrumbs($discussionTopic) {
    $discussionGroup = $discussionTopic->getDiscussionGroup();
    $course = $discussionTopic->getDiscussionGroup()->getCourse();
    return array('breadcrumbs' => array(
            "Courses" => "course",
            $course->getCode() => "course/" . $course->getSlug(),
            "DiscussionGroups" => "course_discussion",
            $discussionGroup->getName() => "discussion/group/" . $discussionGroup->getId(),
            $discussionTopic->getSubject() => "discussion_topic/" . $discussionTopic->getSlug()
        )
    );
  }

  public function courseLinks($course) {
    return array(
        "currentParent" => "courses",
        "current_child" => "my_course",
        "current_link" => "course_discussion"
    );
  }

  public function showBreadcrumbs($discussionTopic) {
    $discussionGroup = $discussionTopic->getDiscussionGroup();
    return array('breadcrumbs' => array(
            "DiscussionGroups" => "discussion_group",
            "DiscussionGroup Explorer" => "discussion_group",
            $discussionGroup->getName() => "discussion/group/" . $discussionGroup->getSlug(),
            myToolkit::shortenString($discussionTopic->getSubject(), 40) => "discussion_topic/" . $discussionTopic->getSlug()
        )
    );
  }

  public function showLinks($discussionTopic) {
    return array(
        "currentParent" => "groups",
        "current_child" => "groups",
        "current_link" => "group_explorer"
    );
  }

  public function showActions($discussionTopic) {
    return array(
        "my_discussion_group" => array("title" => "&lt; My Group", "url" => "discussion/group/" . $discussionTopic->getDiscussionGroup()->getSlug()),
        "manage_peers" => array("title" => "Manage Peers", "url" => "discussion/group/peer"),
        "invite_follower" => array("title" => "+ Invite Peers", "url" => "/discussion/peer/invite"),
    );
  }

  public function getPopupHeight() {
    return array("480px");
  }

  public function getPopupWidth() {
    return array("480px");
  }

  public function linkToDiscussionTopicView($object, $params) {
    return link_to(__('View Topic', array(), 'sf_admin'), "/discussion/topic/" . $object->getSlug(), array("class" => "button-view"));
  }

  public function linkToDiscussionTopicEdit($object, $params) {
    return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_publication"));
  }

  public function linkToDiscussionTopicDelete($object, $params) {
    if (!isset($params['type'])) {
      return link_to(__('Remove', array(), 'sf_admin'), 'discussion_topic_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
    } else {
      return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
    }
  }

  public function linkToDiscussionPostEdit($object, $params) {
    return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/message/" . $object->getId() . "/edit", array("class" => "button-edit", "id" => $object->getId()));
  }

}