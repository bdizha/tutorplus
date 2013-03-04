<?php

/**
 * course module helper.
 *
 * @package    tutorplus
 * @subpackage course
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class courseGeneratorHelper extends BaseCourseGeneratorHelper {

    protected $profile = null;

    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    protected function getProfile()
    {
        return $this->profile;
    }

    public function indexBreadcrumbs()
    {
        return array(
            'breadcrumbs' => array(
                "Setting" => "course",
                "Academic Settings" => "academic_settings",
                "Courses" => "course"
            )
        );
    }

    public function indexLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "courses"
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Setting" => "course",
                "Academic Settings" => "academic_settings",
                "Courses" => "course",
                "New Course" => "course/new"
            )
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "courses"
        );
    }

    public function getEditBreadcrumbs($object)
    {
        return array(
            'breadcrumbs' => array(
                "Setting" => "course",
                "Academic Settings" => "academic_settings",
                "Courses" => "course",
                "Edit Course ~ " . $object->getCode() . " ~ " . $object->getName() => "course/" . $object->getId() . "/edit",
            )
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "settings",
            "current_child" => "academic_settings",
            "current_link" => "courses"
        );
    }

    public function getShowBreadcrumbs($course)
    {
        return array(
            'breadcrumbs' => array(
                "Courses" => "/course/explorer",
                "My Courses" => "/my/courses",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug()
            )
        );
    }

    public function getShowLinks($course)
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
        );
    }

    public function myCoursesBreadcrumbs()
    {
        return array(
            'breadcrumbs' => array(
                "Courses" => "courses",
                "My Courses" => "my_courses"
            )
        );
    }

    public function myCoursesLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
        );
    }

    public function exploreCoursesBreadcrumbs()
    {
        return array(
            'breadcrumbs' => array(
                "Courses" => "my_courses",
                "Course Explorer" => "course_explorer"
            )
        );
    }

    public function courseExplorerLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "course_explorer"
        );
    }

    public function calendarBreadcrumbs($course)
    {
        return array('breadcrumbs' => array(
                "Courses" => "course",
                $course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug(),
                "Calendar" => "course_calendar"
            )
        );
    }

    public function calendarLinks($course)
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_calendar",
            "slug" => $course->getSlug()
        );
    }

    public function showToEdit($object, $sf_user)
    {
        if ($sf_user->isSuperAdmin()) {
            return '<span class="actions"><a id="edit_course" href="/course/' . $object->getId() . '/edit">Edit</a></span>';
        } else {
            return '';
        }
    }

    public function getShowActions()
    {
        return array(
            'actions' => array(
                "my_courses" =>
                array(
                    "title" => "< My Courses",
                    "url" => "/my/courses"
                )
            )
        );
    }

    public function getShowTabs($course, $activeTab = "show")
    {
        $courseSyllabus = CourseSyllabusTable::getInstance()->findOrCreateOneByCourse($course->getId());
        $tabs = array(
            "posts" => array(
                "label" => "Course Info",
                "href" => "/my/course/" . $course->getSlug(),
                "is_active" => $activeTab == "show"
            ),
            "syllabus" => array(
                "label" => "Syllabus",
                "href" => "/course/syllabus/" . $courseSyllabus->getId(),
                "is_active" => $activeTab == "syllabus"
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
                "count" => $course->getCourseDiscussions()->count(),
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
            unset($tabs["instructors"]);
        }

        return $tabs;
    }

    public function getTabs($exploreCourses, $myCourses, $activeTab)
    {
        return array(
            "explore_courses" => array(
                "label" => "Course Explorer",
                "href" => "/course/explorer",
                "count" => $exploreCourses->count(),
                "is_active" => $activeTab == "explorer"
            ),
            "my_courses" => array(
                "label" => "My Courses",
                "href" => "/my/courses",
                "count" => count($myCourses),
                "is_active" => $activeTab == "my"
            )
        );
    }

}