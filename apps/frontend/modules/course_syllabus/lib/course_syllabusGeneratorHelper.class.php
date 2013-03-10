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
    protected $courseSyllabus = null;

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

    public function getTabs($course, $activeTab = "show", $courseSyllabus = null)
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

        return $tabs;
    }

    public function getBreadcrumbs($course, $courseSyllabus = null)
    {
        if (!is_null($courseSyllabus)) {
            $this->setCourseSyllabus($courseSyllabus);
        }
        return array(
            'breadcrumbs' => array(
                "Courses" => "/course/explorer",
                myToolkit::shortenString($course->getCode() . " ~ " . $course->getName(), 255) => "/my/course/" . $course->getSlug(),
                "Syllabus" => "course/syllabus/" . $this->getCourseSyllabus()->getId()
            )
        );
    }

    public function getLinks($course)
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_syllabus",
            "slug" => $course->getSlug()
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