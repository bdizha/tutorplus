<?php

/**
 * tpCourse module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpCourse
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCourseGeneratorHelper extends BaseTpCourseGeneratorHelper
{

    protected $profile = null;
    protected $course = null;

    public function setCourse($course)
    {
        $this->course = $course;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    protected function getProfile()
    {
        return $this->profile;
    }

    public function getBreadcrumbs()
    {
        return array(
            'breadcrumbs' => array(
                "Setting" => "course",
                "Academic Settings" => "academic_settings",
                "Courses" => "course"
            )
        );
    }

    public function getLinks()
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

    public function getBreadcrumbs($currentTitle = "", $currentUrl = "")
    {
        $breadcrumbs = array("breadcrumbs");
        $breadcrumbs["breadcrumbs"]["Courses"] = "course/explorer";
        if ($this->getCourse()) {
            $breadcrumbs["breadcrumbs"][$this->getCourse()->getCode() . " ~ " . $this->getCourse()->getName()] = "course/" . $this->getCourse()->getSlug();
        }

        $breadcrumbs["breadcrumbs"][$currentTitle] = $currentUrl;
        return $breadcrumbs;
    }

    public function getLinks($currentLink = "course_info")
    {
        if ($this->getCourse()) {
            return array(
                "currentParent" => "courses",
                "current_child" => "my_course",
                "current_link" => $currentLink,
                "slug" => $this->getCourse()->getSlug()
            );
        } else {
            return array(
                "currentParent" => "courses",
                "current_child" => "courses",
                "current_link" => $currentLink
            );
        }
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

    public function getVidoeTabs()
    {
        return array(
            "videos" => array(
                "label" => "Course Videos",
                "href" => "/course/videos",
                "count" => 0,
                "is_active" => true
            )
        );

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