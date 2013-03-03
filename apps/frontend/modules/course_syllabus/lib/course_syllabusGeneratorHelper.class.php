<?php

/**
 * course_syllabus module helper.
 *
 * @package    tutorplus.org
 * @subpackage course_syllabus
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_syllabusGeneratorHelper extends BaseCourse_syllabusGeneratorHelper {

    protected $profile = null;

    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    protected function getProfile()
    {
        return $this->profile;
    }

    public function getTabs($course, $activeTab = "show")
    {
        $courseSyllabus = CourseSyllabusTable::getInstance()->findOrCreateOneByCourse($course->getId());
        $tabs = array(
            "posts" => array(
                "label" => "Course Info",
                "href" => "/my/course/" . $course->getSlug(),
                "is_active" => $activeTab == "info"
            ),
            "syllabus_show" => array(
                "label" => "Syllabus",
                "href" => "/course/syllabus/" . $courseSyllabus->getId(),
                "is_active" => $activeTab == "show"
            ),
            "syllabus_edit" => array(
                "label" => "Edit Syllabus",
                "href" => "/course/syllabus/" . $courseSyllabus->getId() . "/edit",
                "is_active" => $activeTab == "edit"
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
                "count" => $course->getCourseAnnouncements()->count(),
            ),
            "groups" => array(
                "label" => "Groups",
                "href" => "/course/discussion",
                "count" => $course->getCourseDiscussionGroups()->count(),
            ),
            "peers" => array(
                "label" => "Peers",
                "href" => "/course/peer",
                "count" => $course->getCourseProfiles()->count(),
            ),
            "instructors" => array(
                "label" => "Instructors",
                "href" => "/course/instructors",
                "is_active" => $activeTab == "instructors"
            )
        );

        if (!$this->getProfile()->getIsSuperAdmin()) {
            unset($tabs["syllabus_edit"]);
        } else {
            unset($tabs["instructors"]);
        }
        unset($tabs["announcements"]);

        return $tabs;
    }

    public function getBreadcrumbs($course)
    {
        return array(
            'breadcrumbs' => array(
                "Course" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug()
            )
        );
    }

    public function getLinks($course)
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
        );
    }

}