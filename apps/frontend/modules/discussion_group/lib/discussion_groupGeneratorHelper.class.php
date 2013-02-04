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
            "current_link" => "discussion_group_explorer"
        );
    }

    public function getMyBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Group" => "group",
                "My Group" => "discussion_my_groups"
            )
        );
    }

    public function geMyLinks() {
        return array(
            "currentParent" => "groups",
            "current_child" => "groups",
            "current_link" => "discussion_my_groups"
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

    public function getCourseLinks() {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
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
            "current_link" => "discussion_group_explorer"
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
            "current_link" => "discussion_group_explorer"
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
            "current_link" => "discussion_group_explorer"
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
            "invite_peers" => array("title" => "+ Invite Peers", "href" => "/discussion/peer/invite"),
            "new_topic" => array("title" => "+ New Topic", "href" => "/discussion/topic/new")
        );
        if ($hasProfile) {
            $actions["edit_membership"] = array("title" => "Edit Membership", "url" => "/discussion/peer/" . $discussionPeer->getId() . "/edit");
        } else {
            $actions["join_group"] = array("title" => "+ Join Group", "url" => "/discussion/peer/new");
        }

        return $actions;
    }

    public function getShowTabs($discussionGroup, $course) {
        if (is_object($course) && $course->getId()) {
            return array(
                "posts" => array(
                    "label" => "Course Info",
                    "href" => "/my/course/" . $course->getSlug()
                ),
                "announcements" => array(
                    "label" => "Announcements",
                    "href" => "/course/announcement"
                ),
                "discussions" => array(
                    "label" => "Discussions",
                    "href" => "/course/discussion",
                    "is_active" => true
                ),
                "peers" => array(
                    "label" => "Peers",
                    "href" => "/course/peer"
                )
            );
        } else {
            return array(
                "posts" => array(
                    "label" => "Topics",
                    "href" => "/discussion/group/" . $discussionGroup->getSlug(),
                    "count" => $discussionGroup->getTopics()->count(),
                    "is_active" => true
                ),
                "peers" => array(
                    "label" => "Peers",
                    "href" => "/discussion/peer",
                    "count" => $discussionGroup->getPeers()->count()
                )
            );
        }
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