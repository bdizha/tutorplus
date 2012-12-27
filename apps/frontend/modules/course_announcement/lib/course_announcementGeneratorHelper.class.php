<?php

/**
 * course_announcement module helper.
 *
 * @package    tutorplus
 * @subpackage course_announcement
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_announcementGeneratorHelper extends BaseCourse_announcementGeneratorHelper{ 

    public $course = null;

    public function setCourse($course) {
        $this->course = $course;
    }
    
    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Modules" => "course",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "announcements",
            "slug" => $this->course->getSlug()
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Modules" => "course",
                $this->course->getCode() . " ~ " . myToolkit::shortenString($this->course->getName(), 30) => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement",
                "New Announcement" => "announcement/new"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "announcements",
            "slug" => $this->course->getSlug()
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Modules" => "course",
                $this->course->getCode() . " ~ " . myToolkit::shortenString($this->course->getName(), 30) => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement",
                "Edit Announcement ~ " . $object->getSubject() => "announcement/" . $object->getId() . "/edit",
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "announcements",
            "slug" => $this->course->getSlug()
        );
    }

    public function showBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Modules" => "course",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement",
                myToolkit::shortenString($object->getSubject(), 45) => "announcement/" . $object->getSlug(),
            )
        );
    }

    public function showLinks() {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "announcements",
            "slug" => $this->course->getSlug()
        );
    }
    
    public function showToEdit($object) {
        return '<span class="actions"><a id="edit_course" href="/course/announcement/'. $object->getId() .'/edit">Edit</a></span>';
    }

    public function linkToAnnouncementEdit($object, $params) {
        return link_to(__('Edit', array(), 'sf_admin'), "/course/announcement/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToAnnouncementDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'course_announcement_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }
    
    public function linkToAnnouncementNew(){
        return '<input id="new_course_announcement" type="button" class="button" onClick="document.location.href=\'/course/announcement/new\'" value="+ Add Announcement">';
    }
}