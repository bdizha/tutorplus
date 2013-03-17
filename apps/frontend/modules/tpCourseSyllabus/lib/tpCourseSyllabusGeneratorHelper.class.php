<?php

/**
 * tpCourseSyllabus module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpCourseSyllabus
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCourseSyllabusGeneratorHelper extends BaseTpCourseSyllabusGeneratorHelper
{

    protected $profile = null;
    protected $courseSyllabus = null;
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

    public function setCourseSyllabus($courseSyllabus)
    {
        $this->courseSyllabus = $courseSyllabus;
    }

    protected function getCourseSyllabus()
    {
        return $this->courseSyllabus;
    }

    public function getTabs($activeTab = "show", $courseSyllabus = null)
    {
        if (!is_null($courseSyllabus)) {
            $this->setCourseSyllabus($courseSyllabus);
        }

        $tabs = array(
            "syllabus_show" => array(
                "label" => "Syllabus",
                "href" => "/course/syllabus/" . $this->getCourseSyllabus()->getId(),
                "is_active" => $activeTab == "show"
            ),
            "syllabus_edit" => array(
                "label" => "Edit Syllabus",
                "href" => "/course/syllabus/" . $this->getCourseSyllabus()->getId() . "/edit",
                "is_active" => $activeTab == "edit"
            )
        );

        if (!$this->getProfile()->getIsSuperAdmin()) {
            unset($tabs["syllabus_edit"]);
        } else {
            unset($tabs["instructors"]);
        }
        unset($tabs["announcements"]);

        return array("tabs" => $tabs);
    }

    public function getBreadcrumbs($currentTitle = "", $currentUrl = "")
    {
        $breadcrumbs["breadcrumbs"] = array(
            "Courses" => "course/explorer",
            myToolkit::shortenString($this->getCourse()->getCode() . " ~ " . $this->getCourse()->getName(), 255) => "/my/course/" . $this->getCourse()->getSlug(),
        );
        $breadcrumbs["breadcrumbs"][$currentTitle] = $currentUrl;
        return $breadcrumbs;
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_syllabus",
            "slug" => $this->getCourse()->getSlug()
        );
    }

    public function linkToCancel($object, $params)
    {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/my/course/' . $object->getCourse()->getSlug() . '\'"/>';
    }

    public function linkToDone($object, $params)
    {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/my/course/' . $object->getCourse()->getSlug() . '\'"/>';
    }

}