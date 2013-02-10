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

	protected $discussionGroup = null;

	public function getDiscussionGroup(){
		return $this->discussionGroup;
	}

	public function setDiscussionGroup($discussionGroup){
		$this->discussionGroup = $discussionGroup;
	}

	public function newBreadcrumbs() {
		return array('breadcrumbs' => array());
	}

	public function getNewLinks() {
		return array(
				"currentParent" => "groups",
				"current_child" => "groups",
				"current_link" => "discussion_explorer"
		);
	}

	public function getEditBreadcrumbs($object) {
		return array('breadcrumbs' => array());
	}

	public function getEditLinks() {
		return array(
				"currentParent" => "groups",
				"current_child" => "groups",
				"current_link" => "discussion_explorer"
		);
	}

	public function getCourseBreadcrumbs($discussionTopic) {
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

	public function getCourseLinks($course) {
		return array(
				"currentParent" => "courses",
				"current_child" => "my_course",
				"current_link" => "course_discussion"
		);
	}

	public function getShowBreadcrumbs($discussionTopic) {
		$discussionGroup = $discussionTopic->getDiscussionGroup();
		return array('breadcrumbs' => array(
				"DiscussionGroups" => "discussion_group",
				"DiscussionGroup Explorer" => "discussion_group",
				$discussionGroup->getName() => "discussion/group/" . $discussionGroup->getSlug(),
				myToolkit::shortenString($discussionTopic->getSubject(), 40) => "discussion_topic/" . $discussionTopic->getSlug()
		)
		);
	}

	public function getShowLinks($discussionTopic) {
		return array(
				"currentParent" => "groups",
				"current_child" => "groups",
				"current_link" => "discussion_explorer"
		);
	}

	public function getShowActions($discussionGroup, $discussionPeer, $hasProfile) {
		$actions = array(
				"my_discussion_group" => array("title" => "&lt; My Group", "url" => "/discussion/group/" . $discussionGroup->getSlug()),
				"manage_peers" => array("title" => "Manage Peers", "url" => "/discussion/peer"),
				"invite_peers" => array("title" => "+ Invite Peers", "href" => "/discussion/peer/invite")
		);
		if ($hasProfile) {
			$actions["edit_membership"] = array("title" => "Edit Membership", "url" => "/discussion/peer/" . $discussionPeer->getId() . "/edit");
		} else {
			$actions["join_group"] = array("title" => "+ Join Group", "url" => "/discussion/peer/new");
		}

		return $actions;
	}

	public function getShowTabs($discussionTopic, $myPeers) {
		$discussionGroup = $discussionTopic->getDiscussionGroup();
		return array(
				"posts" => array(
						"label" => "Posts",
						"href" => "/discussion/topic/" . $discussionTopic->getSlug(),
						"count" => $discussionTopic->getPosts()->count(),
						"is_active" => true
				),
				"peers" => array(
						"label" => "Peers",
						"href" => "/discussion/peer",
						"count" => $discussionGroup->getPeers()->count()
				),
				"invite_peers" => array(
						"label" => "+ Invite Peers",
						"href" => "/discussion/peer/invite",
						"count" => $myPeers->count()
				)
		);
	}

	public function getTabs($discussionGroup, $myPeers, $activeTab, $discussionTopic = null) {
		$tabs = array(
				"group_info" => array(
						"label" => "Info",
						"href" => "/discussion/group/" . $discussionGroup->getSlug(),
						"is_active" => $activeTab == "show"
				),
				"topics" => array(
						"label" => "Topics",
						"href" => "/discussion/group/" . $discussionGroup->getSlug() . "/topics",
						"count" => $discussionGroup->getTopics()->count()
				),
				"new_topic" => array(
						"label" => "+ New Topic",
						"href" => "/discussion/topic/new",
						"is_active" => $activeTab == "new"
				),
				"peers" => array(
						"label" => "Peers",
						"href" => "/discussion/peer",
						"count" => $discussionGroup->getPeers()->count()
				),
				"invite_peers" => array(
						"label" => "+ Invite Peers",
						"href" => "/discussion/peer/invite",
						"count" => $myPeers->count()
				)
		);

		if($activeTab == "edit"){
			$tabs["edit_group"] =  array(
					"label" => "Edit Topic",
					"href" => "/discussion/topic/" . $discussionTopic->getId() . "/edit",
					"is_active" => true
			);
		}

		return $tabs;
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

	public function linkToDiscussionPostEdit($object, $params) {
		return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/message/" . $object->getId() . "/edit", array("class" => "button-edit", "id" => $object->getId()));
	}

	public function linkToCancel($object, $params) {
		return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/discussion/group/' . $this->getDiscussionGroup()->getSlug() .'\'"/>';
	}

	public function linkToDone($object, $params) {
		return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/discussion/group/' . $this->getDiscussionGroup()->getSlug() .'\'"/>';
	}

	public function linkToDelete($object, $params) {
		return '<li class="delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
	}


}