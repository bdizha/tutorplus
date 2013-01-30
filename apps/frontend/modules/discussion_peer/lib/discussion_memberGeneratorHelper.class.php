<?php

/**
 * discussion_peer module helper.
 *
 * @package    tutorplus
 * @subpackage discussion_peer
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_peerGeneratorHelper extends Basediscussion_peerGeneratorHelper
{
    public $discussionGroup = null;

    public function setDiscussionGroup($discussionGroup)
    {
        $this->discussionGroup = $discussionGroup;
    }

    public function linkToMyDiscussionGroup($object, $params)
    {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/discussion/group/' . $object->getDiscussionGroup()->getSlug() . '\';return false"/>';
    }

    public function linkToListDiscussionGroup($params)
    {
        $discussionGroupId = sfContext::getInstance()->getUser()->getMyAttribute('discussion_group_show_id', null);
        $discussionGroup = DiscussionGroupTable::getInstance()->find($discussionGroupId);
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/discussion/group/' . $discussionGroup->getSlug() . '\';return false"/>';
    }

    public function linkToPeers($object, $params)
    {
        return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/discussion/peer", array("onclick" => "document.location.href='/discussion/peer';return false")) . '</li>';
    }

    public function linkToManagePeers($object, $params)
    {
        return '<input class="button" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" onclick="document.location.href=\'/discussion/peer\';return false"/>';
    }

    public function linkToShow($object, $params)
    {
        return '<li class="sf_admin_action_show">' . link_to(__($params['label'], array(), 'sf_admin'), "/discussion/group/" . $object->getId(), array("onclick" => "document.location.href='/discussion/group/'" . $object->getSlug() . ";return false")) . '</li>';
    }

    public function courseBreadcrumbs($discussionGroup)
    {
        $course = $discussionGroup->getCourse();
        return array('breadcrumbs' => array(
            "Courses" => "course",
            $course->getCode() . " ~ " . myToolkit::shortenString($course->getName(), 50) => "course/" . $course->getSlug(),
            "DiscussionGroups" => "course_discussion",
            myToolkit::shortenString($discussionGroup->getName(), 50) => "discussion/group/" . $discussionGroup->getSlug(),
            "Peers" => "discussion_peer"
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

    public function DiscussionGroupBreadcrumbs($discussionGroup)
    {
        return array('breadcrumbs' => array(
            "DiscussionGroups" => "discussion_group",
            "DiscussionGroup Explorer" => "discussion_group",
            myToolkit::shortenString($discussionGroup->getName(), 50) => "discussion/group/" . $discussionGroup->getSlug(),
            "Peers" => "discussion_peer"
        )
        );
    }

    public function DiscussionGroupLinks($discussionTopic)
    {
        return array(
            "currentParent" => "DiscussionGroups",
            "current_child" => "DiscussionGroups",
            "current_link" => "group_explorer"
        );
    }

    public function editBreadcrumbs($object)
    {
        $discussionGroup = $object->getDiscussionGroup();
        return array('breadcrumbs' => array(
            "Group Explorer" => "discussion_group",
            myToolkit::shortenString($discussionGroup->getName(), 50) => "discussion/group/" . $discussionGroup->getSlug(),
            "Peers" => "discussion/peer",
            "Edit Participant ~ " . $object->getNickname() => "discussion/peer/" . $object->getId() . "/edit"
        )
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
            "DiscussionGroup Explorer" => "discussion/group",
            myToolkit::shortenString($this->discussionGroup->getName(), 50) => "discussion/group/" . $this->discussionGroup->getSlug(),
            "Peers" => "discussion/peer",
            "New Participant" => "discussion/peer/new"
        )
        );
    }

    public function editLinks()
    {
        return array(
            "currentParent" => "groups",
            "current_child" => "groups",
            "current_link" => "group_explorer"
        );
    }

}