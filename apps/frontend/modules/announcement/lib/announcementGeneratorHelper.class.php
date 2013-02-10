<?php

/**
 * announcement module helper.
 *
 * @package    tutorplus
 * @subpackage announcement
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class announcementGeneratorHelper extends BaseAnnouncementGeneratorHelper {
	public function indexBreadcrumbs() {
		return array('breadcrumbs' => array(
				"Timeline" => "activity_feed",
				"Announcements" => "announcement"
		)
		);
	}

	public function indexLinks() {
		return array(
				"currentParent" => "timeline",
				"current_child" => "timeline",
				"current_link" => "announcements"
		);
	}

	public function newBreadcrumbs() {
		return array('breadcrumbs' => array(
				"Timeline" => "activity_feed",
				"Announcements" => "announcement",
				"New Announcement" => "announcement/new"
		)
		);
	}

	public function getNewLinks() {
		return array(
				"currentParent" => "timeline",
				"current_child" => "timeline",
				"current_link" => "announcements"
		);
	}

	public function getEditBreadcrumbs($object) {
		return array('breadcrumbs' => array(
				"Timeline" => "activity_feed",
				"Announcements" => "announcement",
				"Edit Announcement ~ " . $object->getSubject() => "announcement/" . $object->getId() . "/edit",
		)
		);
	}

	public function getEditLinks() {
		return array(
				"currentParent" => "timeline",
				"current_child" => "timeline",
				"current_link" => "announcements"
		);
	}

	public function linkToEdit($object, $params) {
		return link_to(__('Edit', array(), 'sf_admin'), "/announcement/" . $object->getId() . "/edit", array("class" => "button-edit"));
	}

	public function getTabs($announcements, $newsItems, $activeTab, $announcement = null) {
		$tabs = array(
				"announcements" => array(
						"label" => "Announcements",
						"href" => "/announcement/",
						"count" => $announcements->count(),
						"is_active" => true
				),
				"news_items" => array(
						"label" => "News Items",
						"href" => "/news/item",
						"count" => $newsItems->count()
				)
		);

		if($activeTab == "new"){
			$tabs["new_announcement"] =  array(
					"label" => "+ New Announcement",
					"href" => "/announcement/new",
					"is_active" => $activeTab == "new"
			);
		}
		elseif($activeTab == "edit"){
			$tabs["edit_edit"] =  array(
					"label" => "Edit Announcement",
					"href" => "/announcement/" . $announcement->getId() . "/edit",
					"is_active" => $activeTab == "edit"
			);
		}

		return $tabs;
	}

}