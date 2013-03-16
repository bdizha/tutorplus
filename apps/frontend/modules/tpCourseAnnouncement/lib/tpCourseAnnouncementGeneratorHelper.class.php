<?php

/**
 * tpCourseAnnouncement module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpCourseAnnouncement
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCourseAnnouncementGeneratorHelper extends BaseTpCourseAnnouncementGeneratorHelper
{

    public $course = null;

    public function setCourse($course)
    {
        $this->course = $course;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function getBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement"
            )
        );
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "announcements",
            "slug" => $this->course->getSlug()
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Modules" => "course",
                $this->course->getCode() . " ~ " . myToolkit::shortenString($this->course->getName(), 30) => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement",
                "New Announcement" => "announcement/new"
            )
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "announcements",
            "slug" => $this->course->getSlug()
        );
    }

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $this->course->getCode() . " ~ " . myToolkit::shortenString($this->course->getName(), 30) => "course/" . $this->course->getSlug(),
                "Announcements" => "course/announcement",
                "Edit Announcement ~ " . $object->getSubject() => "announcement/" . $object->getId() . "/edit",
            )
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
        );
    }

    public function getShowBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement",
                myToolkit::shortenString($object->getSubject(), 45) => "announcement/" . $object->getSlug(),
            )
        );
    }

    public function getShowLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "announcements",
            "slug" => $this->course->getSlug()
        );
    }

    public function showToEdit($object)
    {
        return '<span class="actions"><a id="edit_course" href="/course/announcement/' . $object->getId() . '/edit">Edit</a></span>';
    }

    public function linkToEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/course/announcement/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToDelete($object, $params)
    {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'course_announcement_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function getIndexActions()
    {
        return array(
            'actions' => array(
                "new_announcement" =>
                array(
                    "title" => "+ Add Announcement",
                    "url" => "course/announcement/new"
                )
            )
        );
    }

    public function getTabs($course, $activeTab, $courseAnnouncement = null)
    {
        $tabs = array(
            "announcements" => array(
                "label" => "Announcements",
                "href" => "/course/announcement",
                "count" => $course->getCourseAnnouncements()->count(),
                "is_active" => $activeTab == "index"
            ),
            "new_announcement" => array(
                "label" => "+ New Announcement",
                "href" => "/course/announcement/new",
                "is_active" => $activeTab == "new"
            )
        );

        if ($activeTab == "edit") {
            $tabs["edit_announcement"] = array(
                "label" => "Edit Announcement",
                "href" => "/course/announcement/" . $courseAnnouncement->getId() . "/edit",
                "is_active" => $activeTab == "edit"
            );
        }

        return $tabs;
    }

}