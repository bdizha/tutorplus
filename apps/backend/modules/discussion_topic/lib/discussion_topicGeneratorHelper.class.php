<?php

/**
 * discussion_topic module helper.
 *
 * @package    ecollegeplus
 * @subpackage discussion_topic
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topicGeneratorHelper extends BaseDiscussion_topicGeneratorHelper {

    public function linkToShow($object, $params) {
        if (!is_null($object->getId())) {
            return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/discussion/" . $object->getId(), array()) . '</li>';
        }
    }

    public function linkToMyDiscussion($object, $params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/backend.php/discussion/' . $object->getDiscussionId() . '\';return false"/>';
    }

    public function linkToManageMembers($params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/backend.php/discussion_member\';return false"/>';
    }

    public function courseBreadcrumbs($discussionTopic) {
        $discussion = $discussionTopic->getDiscussion();
        $course = $discussionTopic->getDiscussion()->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug(),
                "Discussions" => "course_discussion",
                $discussion->getName() => "discussion/" . $discussion->getId(),
                $discussionTopic->getSubject() => "discussion_topic/" . $discussionTopic->getSlug()
            )
        );
    }

    public function courseLinks($course) {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_discussion"
        );
    }

    public function discussionBreadcrumbs($discussionTopic) {
        $discussion = $discussionTopic->getDiscussion();
        return array('breadcrumbs' => array(
                "Discussions" => "discussion",
                "Discussion Explorer" => "discussion",
                $discussion->getName() => "discussion/" . $discussion->getSlug(),
                $discussionTopic->getSubject() => "discussion_topic/" . $discussionTopic->getSlug()
            )
        );
    }

    public function discussionLinks($discussionTopic) {
        return array(
            "current_parent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

    public function showContentActions($discussionTopic) {
        return array(
            "my_discussion" => array("title" => "&lt; My Discussion", "url" => "discussion/" . $discussionTopic->getDiscussion()->getSlug()),
            "manage_participants" => array("title" => "Manage Participants", "url" => "discussion_member"),
        );
    }

    public function timelineBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Timeline" => "email_template"
            )
        );
    }

    public function timelineLinks() {
        $sfUser = sfContext::getInstance()->getUser();
        $userId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "current_parent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_discussions",
            "slug" => $sfUser->getGuardUser()->getSlug(),
            "ignore" => !$sfUser->isCurrent($userId)
        );
    }

}