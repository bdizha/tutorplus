<?php

/**
 * discussion module helper.
 *
 * @package    tutorplus.org
 * @subpackage discussion
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussionGeneratorHelper extends BaseDiscussionGeneratorHelper
{

    public function explorerBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Discussions" => "/my/discussions",
                "Discussion Explorer" => "/discussion/explorer"
            )
        );
    }

    public function explorerLinks()
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

    public function getMyBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Discussions" => "/my/discussions",
                "Group Explorer" => "/my/discussions"
            )
        );
    }

    public function getMyLinks()
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_my"
        );
    }

    public function getCourseBreadcrumbs($discussion)
    {
        return array('breadcrumbs' => array(
                "Discussions" => "/my/discussions",
                $discussion->getName() => "/discussion/" . $discussion->getSlug()
            )
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Discussions" => "/my/discussions",
                "New Discussion" => "/discussion/new"
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

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Discussions" => "/my/discussions",
                "Edit Discussion" => "/discussion/" . $object->getId() . "/edit"
            )
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

    public function getShowBreadcrumbs($discussion)
    {
        return array('breadcrumbs' => array(
                "Discussions" => "/my/discussions",
                $discussion->getName() => "/discussion/" . $discussion->getSlug(),
                "Topics" => "/discussion/" . $discussion->getSlug()
            )
        );
    }

    public function getShowLinks()
    {
        return array(
            "currentParent" => "discussions",
            "current_child" => "discussions",
            "current_link" => "discussion_explorer"
        );
    }

    public function linkToDiscussionTopicEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToDiscussionTopicView($object, $params)
    {
        return link_to(__('View Topic', array(), 'sf_admin'), "/discussion/topic/" . $object->getSlug(), array("class" => "button-view"));
    }

    public function linkToDiscussionTopicDelete($object, $params)
    {
        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'discussion_topic_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToDiscussionView($object, $params)
    {
        return link_to(__('View', array(), 'sf_admin'), "/discussion/" . $object->getSlug(), array("class" => "button-view"));
    }

    public function linkToDiscussionEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/discussion/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToDiscussionDelete($object, $params)
    {
        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'discussion_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function getShowActions($discussion, $discussionPeer, $hasProfile)
    {
        $actions = array(
            "my_discussion" => array("title" => "&lt; My Discussions", "url" => "/my/discussions"),
            "manage_peers" => array("title" => "Manage Peers", "url" => "/discussion/peer"),
            "invite_peers" => array("title" => "+ Invite Peers", "url" => "/discussion/peer/invite"),
            "new_topic" => array("title" => "+ New Topic", "url" => "/discussion/topic/new")
        );
        if ($hasProfile) {
            $actions["edit_membership"] = array("title" => "Edit Membership", "url" => "/discussion/peer/" . $discussionPeer->getId() . "/edit");
        } else {
            $actions["join_discussion"] = array("title" => "+ Join Discussion", "url" => "/discussion/peer/new");
        }

        return $actions;
    }

    public function getShowTabs($discussion, $activeTab)
    {
        return array(
            "discussion_info" => array(
                "label" => "Discussion Info",
                "href" => "/discussion/" . $discussion->getSlug(),
                "is_active" => $activeTab == "show"
            ),
            "topics" => array(
                "label" => "Topics",
                "href" => "/discussion/" . $discussion->getSlug() . "/topics",
                "count" => $discussion->getTopics()->count(),
                "is_active" => $activeTab == "topics"
            ),
            "new_topics" => array(
                "label" => "+ New Topic",
                "href" => "/discussion/topic/new"
            ),
            "peers" => array(
                "label" => "Peers",
                "href" => "/discussion/peer",
                "count" => $discussion->getPeers()->count()
            ),
            "invite_peers" => array(
                "label" => "+ Invite Peers",
                "href" => "/discussion/peer/invite",
                "count" => $discussion->getPeers()->count()
            )
        );
    }

    public function getTabs($myDiscussions, $exploreDiscussions, $activeTab, $discussion = null)
    {
        $tabs = array(
            "explore_discussions" => array(
                "label" => "Discussion Explorer",
                "href" => "/discussion/explorer",
                "count" => $exploreDiscussions->count(),
                "is_active" => $activeTab == "explorer"
            ),
            "my_discussions" => array(
                "label" => "My Discussions",
                "href" => "/my/discussions",
                "count" => $myDiscussions->count(),
                "is_active" => $activeTab == "my"
            ),
            "new_discussion" => array(
                "label" => "+ New Discussion",
                "href" => "/discussion/new",
                "is_active" => $activeTab == "new"
            ),
        );

        if ($activeTab == "edit") {
            $tabs["edit_discussion"] = array(
                "label" => "Edit Discussion",
                "href" => "/course/discussion/" . $discussion->getId() . "/edit",
                "is_active" => true
            );
        }

        return $tabs;
    }

    public function linkToEditMembership($discussionPeerId)
    {
        return '<input id="edit_discussion_peership" type="button" class="button" onClick="document.location.href=\'/discussion/peer/' . $discussionPeerId . '/edit\'" value="Edit Membership">';
    }

    public function linkToCancel($object, $params)
    {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/discussion/explorer\'"/>';
    }

    public function linkToDone($object, $params)
    {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/discussion/explorer\'"/>';
    }

}
