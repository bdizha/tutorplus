<?php

/**
 * course_announcement module helper.
 *
 * @package    tutorplus
 * @subpackage course_announcement
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_announcementGeneratorHelper extends BaseCourse_announcementGeneratorHelper {

    protected $course = null;

    public function setCourse($course) {
        $this->course = $course;
    }

    public function linkToAnnounce() {
        return '<li class="sf_admin_action_announce"><input type="button" class="button" value="+ Announce"/></li>';
    }

    public function indexBreadcrumbs($course) {
        return array('breadcrumbs' => array(
                "Courses" => "course",
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
                "Courses" => "course",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getSlug(),
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
                "Courses" => "course",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getSlug(),
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

}