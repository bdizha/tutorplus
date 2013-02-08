<?php

/**
 * discussion_peer module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_peer
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_peerGeneratorHelper extends BaseDiscussion_peerGeneratorHelper {

    public $discussionGroup = null;

    public function setDiscussionGroup($discussionGroup) {
        $this->discussionGroup = $discussionGroup;
    }

    public function getDiscussionGroup() {
        return $this->discussionGroup;
    }

    public function getDiscussionGroupBreadcrumbs() {
        return array(
            'breadcrumbs' => array(
                "DiscussionGroups" => "discussion_group",
                "DiscussionGroup Explorer" => "discussion_group",
                $this->getDiscussionGroup()->getName() => "discussion/group/" . $this->getDiscussionGroup()->getSlug(),
                "Discussion Peers" => "discussion/peer"
            )
        );
    }

    public function getDiscussionGroupLinks() {
        return array(
            "currentParent" => "groups",
            "current_child" => "groups",
            "current_link" => "discussion_group_explorer"
        );
    }

    public function getCourseBreadcrumbs() {
        $course = $this->getDiscussionGroup()->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . myToolkit::shortenString($course->getName(), 50) => "course/" . $course->getSlug(),
                "Discussions" => "course_discussion",
                myToolkit::shortenString($this->getDiscussionGroup()->getName(), 50) => "course/discussion/group/" . $this->getDiscussionGroup()->getSlug(),
                "Peers" => "discussion_peer"
            )
        );
    }

    public function getCourseLinks() {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_discussion"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Discussion Explorer" => "discussion/group",
                myToolkit::shortenString($this->discussionGroup->getName(), 50) => "discussion/group/" . $this->discussionGroup->getSlug(),
                "Peers" => "discussion/peer",
                "Join Group" => "discussion/peer/new"
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

    public function getEditLinks() {
        return array(
            "currentParent" => "groups",
            "current_child" => "groups",
            "current_link" => "discussion_group_explorer"
        );
    }

    public function getEditBreadcrumbs($object) {
        $discussionGroup = $object->getDiscussionGroup();
        return array('breadcrumbs' => array(
                "Group Explorer" => "discussion_group",
                myToolkit::shortenString($discussionGroup->getName(), 50) => "discussion/group/" . $discussionGroup->getSlug(),
                "Peers" => "discussion/peer",
                "Edit Membership ~ " . $object->getNickname() => "discussion/peer/" . $object->getId() . "/edit"
            )
        );
    }

    public function getIndexActions($discussionGroup, $discussionPeer, $hasProfile) {
        $actions = array(
            "my_discussion_group" => array("title" => "&lt; My Group", "url" => "/discussion/group/" . $discussionGroup->getSlug()),
            "invite_peers" => array("title" => "+ Invite Peers", "url" => "/discussion/peer/invite"),
            "new_topic" => array("title" => "+ New Topic", "href" => "/discussion/topic/new")
        );
        if ($hasProfile) {
            $actions["edit_membership"] = array("title" => "Edit Membership", "url" => "/discussion/peer/" . $discussionPeer->getId() . "/edit");
        } else {
            $actions["join_group"] = array("title" => "+ Join Group", "url" => "/discussion/peer/new");
        }

        return $actions;
    }

    public function getIndexTabs($discussionGroup, $myPeers) {
        return array(
            "posts" => array(
                "label" => "Topics",
                "href" => "/discussion/group/" . $discussionGroup->getSlug(),
                "count" => $discussionGroup->getTopics()->count()
            ),
            "peers" => array(
                "label" => "Peers",
                "href" => "/discussion/peer",
                "count" => $discussionGroup->getPeers()->count(),
                "is_active" => true
            ),
            "invite_peers" => array(
                "label" => "+ Invite Peers",
                "href" => "/discussion/peer/invite",
                "count" => $myPeers->count()
            )
        );
    }

    public function getInviteTabs($discussionGroup, $myPeers) {
        return array(
            "posts" => array(
                "label" => "Topics",
                "href" => "/discussion/group/" . $discussionGroup->getSlug(),
                "count" => $discussionGroup->getTopics()->count()
            ),
            "peers" => array(
                "label" => "Peers",
                "href" => "/discussion/peer",
                "count" => $discussionGroup->getPeers()->count()
            ),
            "invite_peers" => array(
                "label" => "+ Invite Peers",
                "href" => "/discussion/peer/invite",
                "count" => $myPeers->count(),
                "is_active" => true
            )
        );
    }

}