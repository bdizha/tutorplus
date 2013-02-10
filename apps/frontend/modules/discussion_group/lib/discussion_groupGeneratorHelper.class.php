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
				"Discussion Explorer" => "group"
		)
		);
	}

	public function explorerLinks() {
		return array(
				"currentParent" => "groups",
				"current_child" => "groups",
				"current_link" => "discussion_explorer"
		);
	}

	public function getMyBreadcrumbs() {
		return array('breadcrumbs' => array(
				"Group" => "group",
				"My Group" => "discussion_my"
		)
		);
	}

	public function geMyLinks() {
		return array(
				"currentParent" => "groups",
				"current_child" => "groups",
				"current_link" => "discussion_my"
		);
	}

	public function getCourseBreadcrumbs($discussionGroup) {
		return array('breadcrumbs' => array(
				"DiscussionGroups" => "discussion_group",
				"DiscussionGroup Explorer" => "discussion_group",
				$discussionGroup->getName() => "discussion/group/" . $discussionGroup->getSlug()
		)
		);
	}

	public function newBreadcrumbs() {
		return array('breadcrumbs' => array(
				"Group Explorer" => "group",
				"New Group" => "group/new"
		)
		);
	}

	public function getNewLinks() {
		return array(
				"currentParent" => "groups",
				"current_child" => "groups",
				"current_link" => "discussion_explorer"
		);
	}

	public function getEditBreadcrumbs($object) {
		return array('breadcrumbs' => array(
				"Group Explorer" => "group",
				"Edit Group" => "group/" . $object->getId() . "/edit"
		)
		);
	}

	public function getEditLinks() {
		return array(
				"currentParent" => "groups",
				"current_child" => "groups",
				"current_link" => "discussion_explorer"
		);
	}

	public function getShowBreadcrumbs($discussionGroup) {
		return array('breadcrumbs' => array(
				"Group Explorer" => "group",
				$discussionGroup->getName() => "group/" . $discussionGroup->getSlug()
		)
		);
	}

	public function getShowLinks() {
		return array(
				"currentParent" => "groups",
				"current_child" => "groups",
				"current_link" => "discussion_explorer"
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

	public function getShowActions($discussionGroup, $discussionPeer, $hasProfile) {
		$actions = array(
				"my_discussion_group" => array("title" => "&lt; My Groups", "url" => "/my/groups"),
				"manage_peers" => array("title" => "Manage Peers", "url" => "/discussion/peer"),
				"invite_peers" => array("title" => "+ Invite Peers", "url" => "/discussion/peer/invite"),
				"new_topic" => array("title" => "+ New Topic", "url" => "/discussion/topic/new")
		);
		if ($hasProfile) {
			$actions["edit_membership"] = array("title" => "Edit Membership", "url" => "/discussion/peer/" . $discussionPeer->getId() . "/edit");
		} else {
			$actions["join_group"] = array("title" => "+ Join Group", "url" => "/discussion/peer/new");
		}

		return $actions;
	}

	public function getShowTabs($discussionGroup, $course) {
		return array(
				"posts" => array(
						"label" => "Topics",
						"href" => "/discussion/group/" . $discussionGroup->getSlug(),
						"count" => $discussionGroup->getTopics()->count(),
						"is_active" => true
				),
				"new_topics" => array(
						"label" => "+ New Topic",
						"href" => "/discussion/topic/new"
				),
				"peers" => array(
						"label" => "Peers",
						"href" => "/discussion/peer",
						"count" => $discussionGroup->getPeers()->count()
				),
				"invite_peers" => array(
						"label" => "+ Invite Peers",
						"href" => "/discussion/peer/invite",
						"count" => $discussionGroup->getPeers()->count()
				)
		);
	}

	public function getTabs($myDiscussions, $exploreDiscussions, $activeTab, $discussionGroup) {
		$tabs = array(
				"explore_discussions" => array(
						"label" => "Group Explorer",
						"href" => "/group/explorer",
						"count" => $exploreDiscussions->count(),
						"is_active" => $activeTab == "explorer"
				),
				"my_discussions" => array(
						"label" => "My Groups",
						"href" => "/my/groups",
						"count" => $myDiscussions->count(),
						"is_active" => $activeTab == "my"
				),
				"new_group" => array(
						"label" => "+ New Group",
						"href" => "/discussion/group/new",
						"is_active" => $activeTab == "new"
				),
		);

		if($activeTab == "edit"){
			$tabs["edit_group"] =  array(
					"label" => "Edit Group",
					"href" => "/course/discussion/" . $discussionGroup->getId() . "/edit",
					"is_active" => true
			);
		}

		return $tabs;
	}

	public function linkToEditMembership($DiscussionPeerId) {
		return '<input id="edit_discussion_peership" type="button" class="button" onClick="document.location.href=\'/discussion/peer/' . $discussionPeerId . '/edit\'" value="Edit Membership">';
	}

	public function linkToCancel($object, $params) {
		return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/group/explorer\'"/>';
	}

	public function linkToDone($object, $params) {
		return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/group/explorer\'"/>';
	}

}