<?php

/**
 * tpCoursePeer module helper.
 *
 * @package    tutorplus.org
 * @subpackage course_link
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCoursePeerGeneratorHelper
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

    public function getBreadcrumbs($currentTitle = "", $currentUrl = "")
    {
        $breadcrumbs = array('breadcrumbs' => array(
                "Courses" => "course",
                $this->getCourse()->getCode() . " ~ " . $this->getCourse()->getName() => "course/" . $this->getCourse()->getSlug()
            )
        );
        $breadcrumbs["breadcrumbs"][$currentTitle] = $currentUrl;
        return $breadcrumbs;
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "course_peers",
            "slug" => $this->getCourse()->getSlug()
        );
    }

    public function getTabs($activeTab = "peers")
    {
        $tabs = array(
            "peers" => array(
                "label" => "Peers",
                "href" => "/course/peer",
                "count" => $this->getCourse()->getCourseProfiles()->count(),
                "is_active" => $activeTab == "peers"
            ),
            "instructors" => array(
                "label" => "Instructors",
                "href" => "/course/instructors",
                "count" => $this->getCourse()->getCourseInstructors()->count(),
                "is_active" => $activeTab == "instructors"
            )
        );

        if (!$this->getProfile()->getIsSuperAdmin()) {
            unset($tabs["instructors"]);
        }

        return array("tabs" => $tabs);
    }

}