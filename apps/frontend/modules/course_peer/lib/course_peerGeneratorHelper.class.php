<?php

/**
 * course_peer module helper.
 *
 * @package    tutorplus
 * @subpackage course_link
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_peerGeneratorHelper {

    public function indexBreadcrumbs($course) {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug()
            )
        );
    }

    public function indexLinks($course) {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
        );
    }

    public function getIndexTabs($course) {
        return array(
            "posts" => array(
                "label" => "Course Info",
                "href" => "/my/course/" . $course->getSlug()
            ),
            "announcements" => array(
                "label" => "Announcements",
                "href" => "/course/announcement"
            ),
            "discussions" => array(
                "label" => "Discussions",
                "href" => "/course/discussion"
            ),
            "peers" => array(
                "label" => "Peers",
                "href" => "/course/peer",
                "is_active" => true
            )
        );
    }
}