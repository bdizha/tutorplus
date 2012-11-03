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

    public function linkToAnnounce() {
        return '<li class="sf_admin_action_announce"><input type="button" class="button" value="+ Announce"/></li>';
    }

    public function indexBreadcrumbs($course) {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug(),
                "Announcements" => "course_announcement"
            )
        );
    }

    public function indexLinks($course) {
        return array(
            "current_parent" => "courses",
            "current_child" => "my_course",
            "current_link" => "announcements",
            "slug" => $course->getSlug()
        );
    }

}