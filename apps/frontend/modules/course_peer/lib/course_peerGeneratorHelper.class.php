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
						"href" => "/course/announcement",
						"count" => $course->getCourseAnnouncements()->count()
				),
				"groups" => array(
						"label" => "Groups",
						"href" => "/course/discussion",
						"count" => $course->getCourseDiscussionGroups()->count()
				),
				"peers" => array(
						"label" => "Peers",
						"href" => "/course/peer",
						"count" => $course->getCourseProfiles()->count(),
						"is_active" => true
				)
		);
	}
}