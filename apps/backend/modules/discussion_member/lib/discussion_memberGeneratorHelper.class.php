<?php

/**
 * discussion_member module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_member
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_memberGeneratorHelper extends BaseDiscussion_memberGeneratorHelper {

    public function linkToMyDiscussion($object, $params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/backend.php/discussion/' . $object->getDiscussion()->getSlug() . '\';return false"/>';
    }

    public function linkToListDiscussion($params) {
        $discussionId = sfContext::getInstance()->getUser()->getMyAttribute('discussion_show_id', null);
        $discussion = DiscussionTable::getInstance()->find($discussionId);
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/backend.php/discussion/' . $discussion->getSlug() . '\';return false"/>';
    }
    public function linkToMembers($object, $params) {
        return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/discussion_member", array("onclick" => "document.location.href='/backend.php/discussion_member';return false")) . '</li>';
    }

    public function linkToManageParticipants($object, $params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/backend.php/discussion_member\';return false"/>';
    }

    public function linkToShow($object, $params) {
        return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/discussion/" . $object->getId(), array("onclick" => "document.location.href='/backend.php/discussion/'" . $object->getSlug() . ";return false")) . '</li>';
    }

    public function courseBreadcrumbs($discussion) {
        $course = $discussion->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . myToolkit::shortenString($course->getName(), 50) => "course/" . $course->getSlug(),
                "Discussions" => "course_discussion",
                myToolkit::shortenString($discussion->getName(), 50) => "discussion/" . $discussion->getSlug(),
                "Participants" => "discussion_member"
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

    public function discussionBreadcrumbs($discussion) {
        return array('breadcrumbs' => array(
                "Discussions" => "discussion",
                "Discussion Explorer" => "discussion",
                myToolkit::shortenString($discussion->getName(), 50) => "discussion/" . $discussion->getSlug(),
                "Participants" => "discussion_member"
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

    public function editBreadcrumbs() {
        $discussionMemberId = sfContext::getInstance()->getUser()->getMyAttribute('discussion_member_show_id', null);
        $discussionMember = DiscussionMemberTable::getInstance()->find($discussionMemberId);
        $discussion = $discussionMember->getDiscussion();
        return array('breadcrumbs' => array(
                "Discussions" => "discussion",
                "Discussion Explorer" => "discussion",
                myToolkit::shortenString($discussion->getName(), 50) => "discussion/" . $discussion->getSlug(),
                "Participants" => "discussion_member",
                $discussionMember->getUser()->getName() => "discussion/member/" . $discussionMember->getId() . "/edit"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

}