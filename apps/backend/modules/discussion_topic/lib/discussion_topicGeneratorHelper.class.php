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

    public function getUrlForAction($action) {
        return 'list' == $action ? 'discussion_show?id=2' : 'discussion_topic_' . $action;
    }

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/discussion_topic#", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<a title="Edit" alt="Edit" class="edit" href="/backend.php/discussion_topic/' . $object->getId() . '/edit">&nbsp;</a>';
    }

    public function linkToDelete($object, $params) {
        return link_to(__('&nbsp;', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', "class" => "delete", "title" => "Delete", "Delete" => "Delete", 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm']));
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }

    public function linkToShow($object, $params) {
        if (!is_null($object->getId())) {
            return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/backend.php/discussion/" . $object->getId(), array()) . '</li>';
        }
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" value="Cancel"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" value="Done"/>';
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
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getId(),
                "Discussions" => "course_discussion",
                $discussion->getName() => "discussion/" . $discussion->getId(),
                $discussionTopic->getSubject() => "discussion_topic/" . $discussionTopic->getId()
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
                $discussion->getName() => "discussion/" . $discussion->getId(),
                $discussionTopic->getSubject() => "discussion_topic/" . $discussionTopic->getId()
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

}