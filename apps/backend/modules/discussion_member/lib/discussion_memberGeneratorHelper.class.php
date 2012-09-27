<?php

/**
 * discussion_member module helper.
 *
 * @package    ecollegeplus
 * @subpackage discussion_member
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_memberGeneratorHelper extends BaseDiscussion_memberGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/discussion_member#", array("class" => "new")) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/discussion_member/" . $object->getId() . "/edit", array("popup_url" => "/backend.php/discussion_member/" . $object->getId() . "/edit")) . '</li>';
    }

    public function linkToDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return '<li class="sf_admin_action_delete">' . link_to(__('<img src="/images/icons/14x14/delete.png" title="Delete" alt="Delete">', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/backend.php/discussion_member\'"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/backend.php/discussion_member\'"/>';
    }
    
    public function linkToMyDiscussion($object, $params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/backend.php/discussion/' . $object->getDiscussionId() . '\';return false"/>';
    }

    public function linkToListDiscussion($params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/backend.php/discussion/' . sfContext::getInstance()->getUser()->getMyAttribute('discussion_show_id', null) . '\';return false"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="submit" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToMembers($object, $params) {
        return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/discussion_member", array("onclick" => "document.location.href='/backend.php/discussion_member';return false")) . '</li>';
    }

    public function linkToManageParticipants($object, $params) {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/backend.php/discussion_member\';return false"/>';
    }

    public function linkToShow($object, $params) {
        return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/discussion/" . $object->getId(), array("onclick" => "document.location.href='/backend.php/discussion/'" . $object->getId() . ";return false")) . '</li>';
    }

    public function courseBreadcrumbs($discussion) {
        $course = $discussion->getCourse();
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . myToolkit::shortenString($course->getName(), 50) => "course/" . $course->getId(),
                "Discussions" => "course_discussion",
                myToolkit::shortenString($discussion->getName(), 50) => "discussion/" . $discussion->getId(),
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
                myToolkit::shortenString($discussion->getName(), 50) => "discussion/" . $discussion->getId(),
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
                myToolkit::shortenString($discussion->getName(), 50) => "discussion/" . $discussion->getId(),
                "Participants" => "discussion_member",
                $discussionMember->getUser()->getName() => "discussion_member/" . $discussionMember->getId() . "/edit"
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