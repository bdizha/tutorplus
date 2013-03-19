<?php

/**
 * tpCourseDiscussion module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpCourseDiscussion
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCourseDiscussionGeneratorHelper extends BaseTpCourseDiscussionGeneratorHelper
{

    public $course = null;

    public function setCourse($course)
    {
        $this->course = $course;
    }
    
    public function getCourse(){
        return $this->course;
    }

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $this->getCourse()->getCode() . " ~ " . $this->getCourse()->getName() => "course/" . $this->getCourse()->getId(),
                "Discussions" => "course_discussion"
            )
        );
    }

    public function getgetLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "discussions",
            "slug" => $this->getCourse()->getSlug()
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "discussions",
            "slug" => $this->getCourse()->getSlug()
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "discussions",
            "slug" => $this->getCourse()->getSlug()
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $this->getCourse()->getCode() . " ~ " . $this->getCourse()->getName() => "course/" . $this->getCourse()->getId(),
                "New Discussion" => "course/discussion/new"
            )
        );
    }

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $this->getCourse()->getCode() . " ~ " . $this->getCourse()->getName() => "course/" . $this->getCourse()->getId(),
                "Discussions" => "course_discussion",
                $object->getName() => "course/discussion/" . $object->getSlug(),
                "Edit Discussion" => "course/discussion/" . $object->getId() . "/edit"
            )
        );
    }

    public function getShowBreadcrumbs($discussion)
    {
        return array('breadcrumbs' => array(
                "Course Discussions" => "course_discussion",
                $discussion->getName() => "course/discussion/" . $discussion->getSlug()
            )
        );
    }

    public function getTabs($courseDiscussions, $activeTab, $courseDiscussion = null)
    {
        $tabs = array(
            "discussions" => array(
                "label" => "Discussions",
                "href" => "/course/discussion",
                "count" => $courseDiscussions->count(),
                "is_active" => $activeTab == "index"
            ),
            "new_discussion" => array(
                "label" => "+ New Discussion",
                "href" => "/course/discussion/new",
                "is_active" => $activeTab == "new"
            )
        );

        if ($activeTab == "edit") {
            unset($tabs["peers"]);
            $tabs["edit_discussion"] = array(
                "label" => "Edit Discussion",
                "href" => "/course/discussion/" . $courseDiscussion->getId() . "/edit",
                "is_active" => $activeTab == "edit"
            );
        }

        return array("tabs" => $tabs);
    }

    public function linkToDiscussionTopicEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/discussion/topic/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToDiscussionTopicDelete($object, $params)
    {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'discussion_topic_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToDiscussionView($object, $params)
    {
        return link_to(__('View Discussion', array(), 'sf_admin'), "/course/discussion/" . $object->getSlug(), array("class" => "button-view"));
    }

    public function linkToDiscussionEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/course/discussion/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToDiscussionDelete($object, $params)
    {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'course_discussion_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToDiscussion()
    {
        return '<input type="button" class="button" onclick="document.location.href=\'/course/discussion\';" value="&lt; Course Discussions"/>';
    }

    public function linkToDiscussionTopicView($object, $params)
    {
        return link_to(__('View Topic', array(), 'sf_admin'), "/discussion/topic/" . $object->getSlug(), array("class" => "button-view"));
    }

    public function linkToManagePeers()
    {
        return '<input type="button" class="button" onclick="document.location.href=\'/discussion/peer\';" value="Manage Peers"/>';
    }

    public function linkToEditMembership($memberId)
    {
        return '<input id="edit_discussion_peership" type="button" class="button" onClick="document.location.href=\'/discussion/peer/' . $memberId . '/edit\'" value="Edit Membership">';
    }

    public function linkToJoinDiscussion()
    {
        return '<input type="button" class="button" href="/discussion/peer/join" value="Join Discussion">';
    }

    public function linkToInvitePeers()
    {
        return '<input id="invite_follower" type="button" class="button" href="/discussion/peer/invite" value="+ Invite Peers"/>';
    }

    public function linkToNewTopic()
    {
        return '<input type="button" class="button" value="+ New Topic"/>';
    }

}