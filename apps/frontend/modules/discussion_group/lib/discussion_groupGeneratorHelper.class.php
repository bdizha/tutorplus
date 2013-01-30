<?php

/**
 * discussion_group module helper.
 *
 * @package    tutorplus.org
 * @subpackage discussion_group
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_groupGeneratorHelper extends BaseDiscussion_groupGeneratorHelper {

  public function explorerBreadcrumbs() {
    return array('breadcrumbs' => array(
            "Group" => "group",
            "DiscussionGroup Explorer" => "group"
        )
    );
  }

  public function explorerLinks() {
    return array(
        "currentParent" => "groups",
        "current_child" => "groups",
        "current_link" => "group_explorer"
    );
  }

  public function myBreadcrumbs() {
    return array('breadcrumbs' => array(
            "Group" => "group",
            "My Group" => "my_groups"
        )
    );
  }

  public function myLinks() {
    return array(
        "currentParent" => "groups",
        "current_child" => "groups",
        "current_link" => "my_groups"
    );
  }

  public function newBreadcrumbs() {
    return array('breadcrumbs' => array(
            "Group Explorer" => "group",
            "New Group" => "group/new"
        )
    );
  }

  public function newLinks() {
    return array(
        "currentParent" => "groups",
        "current_child" => "groups",
        "current_link" => "group_explorer"
    );
  }

  public function editBreadcrumbs($object) {
    return array('breadcrumbs' => array(
            "Group Explorer" => "group",
            "Edit Group" => "group/" . $object->getId() . "/edit"
        )
    );
  }

  public function editLinks() {
    return array(
        "currentParent" => "groups",
        "current_child" => "groups",
        "current_link" => "group_explorer"
    );
  }

  public function showBreadcrumbs($discussionGroup) {
    return array('breadcrumbs' => array(
            "Group Explorer" => "group",
            $discussionGroup->getName() => "group/" . $discussionGroup->getSlug()
        )
    );
  }

  public function showLinks() {
    return array(
        "currentParent" => "groups",
        "current_child" => "groups",
        "current_link" => "group_explorer"
    );
  }

  public function linkToDiscussionTopicEdit($object, $params) {
    return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/" . $object->getId() . "/edit", array("class" => "button-edit"));
  }

  public function linkToDiscussionTopicView($object, $params) {
    return link_to(__('View Topic', array(), 'sf_admin'), "/discussion/topic/" . $object->getSlug(), array("class" => "button-view"));
  }

  public function linkToDiscussionTopicDelete($object, $params) {
    if (!isset($params['type'])) {
      return link_to(__('Remove', array(), 'sf_admin'), 'discussion_topic_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
    } else {
      return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
    }
  }

  public function linkToDiscussionGroupView($object, $params) {
    return link_to(__('View', array(), 'sf_admin'), "/discussion/group/" . $object->getSlug(), array("class" => "button-view"));
  }

  public function linkToDiscussionGroupEdit($object, $params) {
    return link_to(__('Edit', array(), 'sf_admin'), "/discussion/group/" . $object->getId() . "/edit", array("class" => "button-edit"));
  }

  public function linkToDiscussionGroupDelete($object, $params) {
    if (!isset($params['type'])) {
      return link_to(__('Remove', array(), 'sf_admin'), 'discussion_group_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
    } else {
      return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
    }
  }

  public function showActions($discussionGroup) {
    return array(
        "my_discussion_group" => array("title" => "&lt; My Groups", "url" => "my/groups"),
        "manage_peers" => array("title" => "Manage Peers", "url" => "discussion/group/peer"),
        "invite_follower" => array("title" => "+ Invite Peers", "url" => "/discussion/peer/invite"),
        "new_topic" => array("title" => "+ New Topic", "url" => "/discussion/topic/new"),
        "join_group" => array("title" => "+ Join Group", "url" => "/discussion/peer/new"),
    );
  }

  public function linkToCourseDiscussionGroup() {
    return '<input type="button" class="button" onclick="document.location.href=\'/course/discussion\';" value="&lt; Course Group"/>';
  }

  public function linkToManagePeers() {
    return '<input type="button" class="button" onclick="document.location.href=\'/discussion/peer\';" value="Manage Peers"/>';
  }

  public function linkToEditMembership($DiscussionPeerId) {
    return '<input id="edit_discussion_peership" type="button" class="button" onClick="document.location.href=\'/discussion/peer/' . $discussionPeerId . '/edit\'" value="Edit Membership">';
  }

  public function linkToInvitePeers() {
    return '<input id="invite_follower" type="button" class="button" href="/discussion/peer/invite" value="+ Invite Peers"/>';
  }

  public function linkToNewTopic() {
    return '<input type="button" class="button" value="+ New Topic"/>';
  }

  public function linkToCancel($object, $params) {
    return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/group/explorer\'"/>';
  }

  public function linkToDone($object, $params) {
    return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/group/explorer\'"/>';
  }

}