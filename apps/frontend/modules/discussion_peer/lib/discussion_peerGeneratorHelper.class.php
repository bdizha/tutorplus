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

    protected $discussion = null;
    protected $course = null;

    public function setCourse($course)
    {
        $this->course = $course;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setDiscussion($discussion)
    {
        $this->discussion = $discussion;
    }

    public function getDiscussion()
    {
        return $this->discussion;
    }

    public function getBreadcrumbs($activeIndex = "discussion_peers", $currentTitle = "My Discussions", $currentUrl = "/my/discussions", $discussion = null)
    {
        if (in_array($activeIndex, array("discussion_peers", "discussion_peer_invite", "peer_follow", "peer_edit"))) {
            $breadcrumbs = array("breadcrumbs");
            if ($this->getCourse()) {
                $breadcrumbs["breadcrumbs"] = array(
                    "Courses" => "course/explorer",
                    $this->getCourse()->getName() => "course/" . $this->getCourse()->getSlug()
                );
            }

            $breadcrumbs["breadcrumbs"]["Discussions"] = "my/discussions";
            $breadcrumbs["breadcrumbs"][$discussion->getName()] = "discussion/" . $discussion->getSlug();
        } else {
            $breadcrumbs = array("Discussions" => "my/discussions");
        }
        $breadcrumbs["breadcrumbs"][$currentTitle] = $currentUrl;
        return $breadcrumbs;
    }

    public function getLinks()
    {
        if ($this->getCourse()) {
            return array(
                "currentParent" => "courses",
                "current_child" => "my_course",
                "current_link" => "discussions",
                "slug" => $this->getCourse()->getSlug()
            );
        } else {
            return array(
                "currentParent" => "discussions",
                "current_child" => "discussions",
                "current_link" => "discussion_explorer"
            );
        }
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

    public function getActions($discussionPeer, $hasProfile)
    {
        $actions = array();
        if ($hasProfile) {
            $actions["edit_membership"] = array("title" => "Edit Membership", "url" => "/discussion/peer/" . $discussionPeer->getId() . "/edit");
        } else {
            $actions["join_discussion"] = array("title" => "+ Join Discussion", "url" => "/discussion/peer/new");
        }

        return $actions;
    }

    public function getTabs($discussion, $myPeers, $activeTab, $discussionPeer = null, $hasProfile = false)
    {
        $tabs = array(
            "discussion_info" => array(
                "label" => "Discussion Info",
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
                "is_active" => $activeTab == "peers"
            ),
            "peer_invite" => array(
                "label" => "+ Invite Peers",
                "href" => "/discussion/peer/invite",
                "count" => $myPeers->count(),
                "is_active" => $activeTab == "peer_invite"
            )
        );

        if (!$hasProfile) {
            $tabs["peer_follow"] = array(
                "label" => "Follow Discussion",
                "href" => "/discussion/peer/new",
                "is_active" => $activeTab == "peer_follow"
            );
        } else {
            $tabs["peer_edit"] = array(
                "label" => "Edit Membership",
                "href" => "/discussion/peer/" . $discussionPeer->getId() . "/edit",
                "is_active" => $activeTab == "peer_edit"
            );
        }
        return $tabs;
    }

}
