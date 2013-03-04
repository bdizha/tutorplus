<?php

/**
 * discussion_peer module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_peer
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_peerGeneratorHelper extends BaseDiscussion_peerGeneratorHelper
{

    public $discussion = null;

    public function setDiscussion($discussion)
    {
        $this->discussion = $discussion;
    }

    public function getDiscussion()
    {
        return $this->discussion;
    }

    public function getDiscussionBreadcrumbs()
    {
        return array(
            'breadcrumbs' => array(
                "Discussions" => "discussion",
                "Discussion Explorer" => "discussion",
                $this->getDiscussion()->getName() => "discussion/" . $this->getDiscussion()->getSlug(),
                "Peers" => "discussion/peer"
            )
        );
    }

    public function getDiscussionLinks()
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_my"
        );
    }

    public function getCourseBreadcrumbs()
    {
        $course = $this->getDiscussion()->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . myToolkit::shortenString($course->getName(), 50) => "course/" . $course->getSlug(),
                "Discussions" => "course_discussion",
                myToolkit::shortenString($this->getDiscussion()->getName(), 50) => "course/discussion/" . $this->getDiscussion()->getSlug(),
                "Peers" => "discussion_peer"
            )
        );
    }

    public function getCourseLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_discussion"
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Discussion Explorer" => "discussion",
                myToolkit::shortenString($this->discussion->getName(), 50) => "discussion/" . $this->discussion->getSlug(),
                "Peers" => "discussion/peer",
                "Join Discussion" => "discussion/peer/new"
            )
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

    public function getEditBreadcrumbs($object)
    {
        $discussion = $object->getDiscussion();
        return array('breadcrumbs' => array(
                "Group Explorer" => "discussion",
                myToolkit::shortenString($discussion->getName(), 50) => "discussion/" . $discussion->getSlug(),
                "Peers" => "discussion/peer",
                "Edit Membership ~ " . $object->getNickname() => "discussion/peer/" . $object->getId() . "/edit"
            )
        );
    }

    public function getIndexActions($discussion, $discussionPeer, $hasProfile)
    {
        $actions = array(
            "my_discussion" => array("title" => "&lt; My Discussion", "url" => "/discussion/" . $discussion->getSlug()),
            "invite_peers" => array("title" => "+ Invite Peers", "url" => "/discussion/peer/invite"),
            "new_topic" => array("title" => "+ New Topic", "href" => "/discussion/topic/new")
        );
        if ($hasProfile) {
            $actions["edit_membership"] = array("title" => "Edit Membership", "url" => "/discussion/peer/" . $discussionPeer->getId() . "/edit");
        } else {
            $actions["join_discussion"] = array("title" => "+ Join Discussion", "url" => "/discussion/peer/new");
        }

        return $actions;
    }

    public function getTabs($discussion, $myPeers, $activeTab)
    {
        return array(
            "group_info" => array(
                "label" => "Group Info",
                "href" => "/discussion/" . $discussion->getSlug()
            ),
            "topics" => array(
                "label" => "Topics",
                "href" => "/discussion/" . $discussion->getSlug() . "/topics",
                "count" => $discussion->getTopics()->count()
            ),
            "new_topic" => array(
                "label" => "+ New Topic",
                "href" => "/discussion/topic/new"
            ),
            "peers" => array(
                "label" => "Peers",
                "href" => "/discussion/peer",
                "count" => $discussion->getPeers()->count(),
                "is_active" => $activeTab == "index"
            ),
            "invite_peers" => array(
                "label" => "+ Invite Peers",
                "href" => "/discussion/peer/invite",
                "count" => $myPeers->count(),
                "is_active" => $activeTab == "invite"
            )
        );
    }

}