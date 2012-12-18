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

    public function linkToPrevious() {
        return '<li class="sf_admin_action_announcements"><input type="button" class="button" onclick="window.location=\'/course/announcement\'" value="< Announcements"/></li>';
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
                "Announcement ~ " . $object->getSubject() => "announcement/" . $object->getSlug(),
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

}