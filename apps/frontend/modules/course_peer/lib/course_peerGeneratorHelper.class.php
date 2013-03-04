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

    protected $profile = null;

    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    protected function getProfile()
    {
        return $this->profile;
    }

    public function indexBreadcrumbs($course)
    {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug()
            )
        );
    }

    public function indexLinks($course)
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
        );
    }

    public function getIndexTabs($course, $activeTab = "info")
    {
        $courseSyllabus = CourseSyllabusTable::getInstance()->findOrCreateOneByCourse($course->getId());
        $tabs = array(
            "posts" => array(
                "label" => "Course Info",
                "href" => "/my/course/" . $course->getSlug()
            ),
            "syllabus" => array(
                "label" => "Syllabus",
                "href" => "/course/syllabus/" . $courseSyllabus->getId()
            ),
            "videos" => array(
                "label" => "Videos",
                "href" => "/course/videos",
                "count" => 0,
                "is_active" => $activeTab == "videos"
            ),
            "announcements" => array(
                "label" => "Announcements",
                "href" => "/course/announcement",
                "count" => $course->getCourseAnnouncements()->count()
            ),
            "groups" => array(
                "label" => "Groups",
                "href" => "/course/discussion",
                "count" => $course->getCourseDiscussions()->count()
            ),
            "peers" => array(
                "label" => "Peers",
                "href" => "/course/peer",
                "count" => $course->getCourseProfiles()->count(),
                "is_active" => $activeTab == "peers"
            ),
            "instructors" => array(
                "label" => "Instructors",
                "href" => "/course/instructors",
                "is_active" => $activeTab == "instructors"
            )
        );

        if (!$this->getProfile()->getIsSuperAdmin()) {
            unset($tabs["instructors"]);
        }

        return $tabs;
    }

}