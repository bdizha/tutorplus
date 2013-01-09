<?php

/**
 * discussion_member module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_member
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_memberGeneratorHelper extends BaseDiscussion_memberGeneratorHelper
{
    public $discussion = null;

    public function setDiscussion($discussion)
    {
        $this->discussion = $discussion;
    }

    public function linkToMyDiscussion($object, $params)
    {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/discussion/' . $object->getDiscussion()->getSlug() . '\';return false"/>';
    }

    public function linkToListDiscussion($params)
    {
        $discussionId = sfContext::getInstance()->getUser()->getMyAttribute('discussion_show_id', null);
        $discussion = DiscussionTable::getInstance()->find($discussionId);
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/discussion/' . $discussion->getSlug() . '\';return false"/>';
    }

    public function linkToMembers($object, $params)
    {
        return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/discussion_member", array("onclick" => "document.location.href='/discussion_member';return false")) . '</li>';
    }

    public function linkToManageFollowers($object, $params)
    {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/discussion_member\';return false"/>';
    }

    public function linkToShow($object, $params)
    {
        return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/discussion/" . $object->getId(), array("onclick" => "document.location.href='/discussion/'" . $object->getSlug() . ";return false")) . '</li>';
    }

    public function courseBreadcrumbs($discussion)
    {
        $course = $discussion->getCourse();
        return array('breadcrumbs' => array(
            "Courses" => "course",
            $course->getCode() . " ~ " . myToolkit::shortenString($course->getName(), 50) => "course/" . $course->getSlug(),
            "Discussions" => "course_discussion",
            myToolkit::shortenString($discussion->getName(), 50) => "discussion/" . $discussion->getSlug(),
            "Followers" => "discussion_member"
        )
        );
    }

    public function courseLinks($course)
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_discussion"
        );
    }

    public function discussionBreadcrumbs($discussion)
    {
        return array('breadcrumbs' => array(
            "Discussions" => "discussion",
            "Discussion Explorer" => "discussion",
            myToolkit::shortenString($discussion->getName(), 50) => "discussion/" . $discussion->getSlug(),
            "Followers" => "discussion_member"
        )
        );
    }

    public function discussionLinks($discussionTopic)
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

    public function editBreadcrumbs($object)
    {
        $discussion = $object->getDiscussion();
        return array('breadcrumbs' => array(
            "Discussions" => "discussion",
            "Discussion Explorer" => "discussion",
            myToolkit::shortenString($discussion->getName(), 50) => "discussion/" . $discussion->getSlug(),
            "Followers" => "discussion_member",
            "Edit Participant ~ " . $object->getNickname() => "discussion/member/" . $object->getId() . "/edit"
        )
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
            "Discussions" => "discussion",
            "Discussion Explorer" => "discussion",
            myToolkit::shortenString($this->discussion->getName(), 50) => "discussion/" . $this->discussion->getSlug(),
            "Followers" => "discussion_member",
            "New Participant" => "discussion/member/new"
        )
        );
    }

    public function editLinks()
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

}