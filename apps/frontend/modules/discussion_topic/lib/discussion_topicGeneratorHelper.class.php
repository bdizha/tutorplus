<?php

/**
 * discussion_topic module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_topic
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topicGeneratorHelper extends Basediscussion_topicGeneratorHelper
{

    protected $discussion = null;

    public function getDiscussion()
    {
        return $this->discussion;
    }

    public function setDiscussion($discussion)
    {
        $this->discussion = $discussion;
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Discussions" => "/my/discussions",
                $this->getDiscussion()->getName() => "/discussion/" . $this->getDiscussion()->getSlug(),
                "New Topic" => "/discussion/topic/new"
            )
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_my"
        );
    }

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Discussions" => "/my/discussions",
                $this->getDiscussion()->getName() => "/discussion/" . $this->getDiscussion()->getSlug(),
                "Edit Topic" => "/discussion/topic/" . $object->getId() . "/edit"
            )
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_my"
        );
    }

    public function getCourseBreadcrumbs($discussionTopic)
    {
        $discussion = $discussionTopic->getDiscussion();
        $course = $discussionTopic->getDiscussion()->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() => "course/" . $course->getSlug(),
                "Discussions" => "course_discussion",
                $discussion->getName() => "discussion/" . $discussion->getId(),
                $discussionTopic->getSubject() => "discussion_topic/" . $discussionTopic->getSlug()
            )
        );
    }

    public function getCourseLinks($course)
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_discussion"
        );
    }

    public function getShowBreadcrumbs($discussionTopic)
    {
        $discussion = $discussionTopic->getDiscussion();
        return array('breadcrumbs' => array(
                "Discussions" => "discussion",
                "Discussion Explorer" => "discussion",
                $discussion->getName() => "discussion/" . $discussion->getSlug(),
                myToolkit::shortenString($discussionTopic->getSubject(), 40) => "discussion_topic/" . $discussionTopic->getSlug()
            )
        );
    }

    public function getShowLinks($discussionTopic)
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_my"
        );
    }

    public function getShowActions($discussion, $discussionPeer, $hasProfile)
    {
        $actions = array(
            "my_discussion" => array("title" => "&lt; My Discussion", "url" => "/discussion/" . $discussion->getSlug()),
            "manage_peers" => array("title" => "Manage Peers", "url" => "/discussion/peer"),
            "invite_peers" => array("title" => "+ Invite Peers", "href" => "/discussion/peer/invite")
        );
        if ($hasProfile) {
            $actions["edit_membership"] = array("title" => "Edit Membership", "url" => "/discussion/peer/" . $discussionPeer->getId() . "/edit");
        } else {
            $actions["join_discussion"] = array("title" => "+ Join Discussion", "url" => "/discussion/peer/new");
        }

        return $actions;
    }

    public function getShowTabs($discussionTopic, $myPeers)
    {
        $discussion = $discussionTopic->getDiscussion();
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
                "count" => $discussion->getPeers()->count()
            ),
            "invite_peers" => array(
                "label" => "+ Invite Peers",
                "href" => "/discussion/peer/invite",
                "count" => $myPeers->count()
            )
        );
    }

    public function getTabs($discussion, $myPeers, $activeTab, $discussionTopic = null)
    {
        $tabs = array(
            "group_info" => array(
                "label" => "Info",
                "href" => "/discussion/" . $discussion->getSlug(),
                "is_active" => $activeTab == "show"
            ),
            "topics" => array(
                "label" => "Topics",
                "href" => "/discussion/" . $discussion->getSlug() . "/topics",
                "count" => $discussion->getTopics()->count()
            ),
            "new_topic" => array(
                "label" => "+ New Topic",
                "href" => "/discussion/topic/new",
                "is_active" => $activeTab == "new"
            ),
            "peers" => array(
                "label" => "Peers",
                "href" => "/discussion/peer",
                "count" => $discussion->getPeers()->count()
            ),
            "invite_peers" => array(
                "label" => "+ Invite Peers",
                "href" => "/discussion/peer/invite",
                "count" => $myPeers->count()
            )
        );

        if ($activeTab == "edit") {
            $tabs["edit_group"] = array(
                "label" => "Edit Topic",
                "href" => "/discussion/topic/" . $discussionTopic->getId() . "/edit",
                "is_active" => true
            );
        }

        return $tabs;
    }

    public function getPopupHeight()
    {
        return array("480px");
    }

    public function getPopupWidth()
    {
        return array("480px");
    }

    public function linkToDiscussionTopicView($object, $params)
    {
        return link_to(__('View Topic', array(), 'sf_admin'), "/discussion/topic/" . $object->getSlug(), array("class" => "button-view"));
    }

    public function linkToDiscussionTopicEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/" . $object->getId() . "/edit", array("class" => "button-edit edit_profile_publication"));
    }

    public function linkToDiscussionPostEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/message/" . $object->getId() . "/edit", array("class" => "button-edit", "id" => $object->getId()));
    }

    public function linkToCancel($object, $params)
    {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/discussion/' . $this->getDiscussion()->getSlug() . '\'"/>';
    }

    public function linkToDone($object, $params)
    {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/discussion/' . $this->getDiscussion()->getSlug() . '\'"/>';
    }

    public function linkToDelete($object, $params)
    {
        return '<li class="delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
    }

}