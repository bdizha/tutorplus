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
            "current_link" => "discussion_group_explorer"
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

    public function getShowTabs($discussionTopic) {
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
            )
        );
    }

    public function getPopupHeight() {
        return array("480px");
        ;
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

}