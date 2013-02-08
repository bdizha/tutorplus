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

	public function indexBreadcrumbs() {
		return array(
				'breadcrumbs' => array(
				"Setting" => "course",
				"Academic Settings" => "academic_settings",
				"Courses" => "course"
		)
		);
	}

	public function indexLinks() {
		return array(
				"currentParent" => "settings",
				"current_child" => "academic_settings",
				"current_link" => "courses"
		);
	}

	public function newBreadcrumbs() {
		return array('breadcrumbs' => array(
				"Setting" => "course",
				"Academic Settings" => "academic_settings",
				"Courses" => "course",
				"New Course" => "course/new"
		)
		);
	}

	public function getNewLinks() {
		return array(
				"currentParent" => "settings",
				"current_child" => "academic_settings",
				"current_link" => "courses"
		);
	}

	public function getEditBreadcrumbs($object) {
		return array(
				'breadcrumbs' => array(
				"Setting" => "course",
				"Academic Settings" => "academic_settings",
				"Courses" => "course",
				"Edit Course ~ " . $object->getCode() . " ~ " . $object->getName() => "course/" . $object->getId() . "/edit",
		)
		);
	}

	public function getEditLinks() {
		return array(
				"currentParent" => "settings",
				"current_child" => "academic_settings",
				"current_link" => "courses"
		);
	}

	public function getShowBreadcrumbs($course) {
		return array(
				'breadcrumbs' => array(
				"Course" => "course",
				$course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug()
		)
		);
	}

	public function getShowLinks($course) {
		return array(
				"currentParent" => "courses",
				"current_child" => "courses",
				"current_link" => "my_courses"
		);
	}

	public function myCoursesBreadcrumbs() {
		return array(
				'breadcrumbs' => array(
				"Courses" => "courses",
				"My Courses" => "my_courses"
			)
		);
	}

	public function myCoursesLinks() {
		return array(
				"currentParent" => "courses",
				"current_child" => "courses",
				"current_link" => "my_courses"
		);
	}

	public function exploreCoursesBreadcrumbs() {
		return array(
				'breadcrumbs' => array(
				"Courses" => "my_courses",
				"Course Explorer" => "course_explorer"
			)
		);
	}

	public function courseExplorerLinks() {
		return array(
				"currentParent" => "courses",
				"current_child" => "courses",
				"current_link" => "course_explorer"
		);
	}

	public function calendarBreadcrumbs($course) {
		return array('breadcrumbs' => array(
				"Courses" => "course",
				$course->getCode() . " ~ " . $course->getName() => "course/" . $course->getSlug(),
				"Calendar" => "course_calendar"
		)
		);
	}

	public function calendarLinks($course) {
		return array(
				"currentParent" => "courses",
				"current_child" => "my_course",
				"current_link" => "course_calendar",
				"slug" => $course->getSlug()
		);
	}

	public function showToEdit($object, $sf_user) {
		if ($sf_user->isSuperAdmin()) {
			return '<span class="actions"><a id="edit_course" href="/course/' . $object->getId() . '/edit">Edit</a></span>';
		} else {
			return '';
		}
	}

	public function getShowActions(){
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

	public function getShowTabs($course) {
		return array(
				"posts" => array(
						"label" => "Course Info",
						"href" => "/my/course/" . $course->getSlug(),
						"is_active" => true
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
						"href" => "/course/peer"
				)
		);
	}

}