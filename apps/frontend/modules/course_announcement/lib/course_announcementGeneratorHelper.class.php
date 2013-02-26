<?php

/**
 * course_announcement module helper.
 *
 * @package    tutorplus
 * @subpackage course_announcement
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_announcementGeneratorHelper extends BaseCourse_announcementGeneratorHelper{ 

    public $course = null;

    public function setCourse($course) {
        $this->course = $course;
    }
    
    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Modules" => "course",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Modules" => "course",
                $this->course->getCode() . " ~ " . myToolkit::shortenString($this->course->getName(), 30) => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement",
                "New Announcement" => "announcement/new"
            )
        );
    }

    public function getNewLinks() {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
        );
    }

    public function getEditBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Modules" => "course",
                $this->course->getCode() . " ~ " . myToolkit::shortenString($this->course->getName(), 30) => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement",
                "Edit Announcement ~ " . $object->getSubject() => "announcement/" . $object->getId() . "/edit",
            )
        );
    }

    public function getEditLinks() {
        return array(
            "currentParent" => "courses",
            "current_child" => "courses",
            "current_link" => "my_courses"
        );
    }

    public function getShowBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Modules" => "course",
                $this->course->getCode() . " ~ " . $this->course->getName() => "course/" . $this->course->getSlug(),
                "Announcements" => "course_announcement",
                myToolkit::shortenString($object->getSubject(), 45) => "announcement/" . $object->getSlug(),
            )
        );
    }

    public function getShowLinks() {
        return array(
            "currentParent" => "courses",
            "current_child" => "my_course",
            "current_link" => "announcements",
            "slug" => $this->course->getSlug()
        );
    }
    
    public function showToEdit($object) {
        return '<span class="actions"><a id="edit_course" href="/course/announcement/'. $object->getId() .'/edit">Edit</a></span>';
    }

    public function linkToEdit($object, $params) {
        return link_to(__('Edit', array(), 'sf_admin'), "/course/announcement/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'course_announcement_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

	public function getIndexActions(){
		return array(
				'actions' => array(
						"new_announcement" =>
						array(
								"title" => "+ Add Announcement",
								"url" => "course/announcement/new"
						)
				)
		);
	}

    public function getTabs($course, $activeTab, $courseAnnouncement = null) {
    	$tabs = array(
    			"course_info" => array(
    					"label" => "Course Info",
    					"href" => "/my/course/" . $course->getSlug()
    			),
				"syllabus" => array(
						"label" => "Syllabus",
						"href" => "/course/syllabus",
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
						"is_active" => $activeTab == "index"
				),
				"groups" => array(
						"label" => "Groups",
						"href" => "/course/discussion",
						"count" => $course->getCourseDiscussionGroups()->count(),
						"is_active" => $activeTab == "groups"
				),
    			"peers" => array(
    					"label" => "Peers",
    					"href" => "/course/peer",
    					"count" => $course->getCourseProfiles()->count()
    			)
    	);
    	
    	if($activeTab == "new"){
    		unset($tabs["peers"]);
    		unset($tabs["groups"]);
    		$tabs["new_announcement"] =  array(
    				"label" => "+ New Announcement",
    				"href" => "/course/announcement/new",
    				"is_active" => $activeTab == "new"
    		);
    	}
    	elseif($activeTab == "edit"){
    		unset($tabs["peers"]);
    		unset($tabs["groups"]);
    		$tabs["edit_announcement"] =  array(
    				"label" => "Edit Announcement",
    				"href" => "/course/announcement/" . $courseAnnouncement->getId() . "/edit",
    				"is_active" => $activeTab == "edit"
    		);
    	}
    	
    	return $tabs;
    }
}