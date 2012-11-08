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

    public function linkToPrevious() {
        return '<li class="sf_admin_action_announcements"><input type="button" class="button" onclick="window.location=\'/announcement\'" value="< Announcements"/></li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Communication" => "activity_feed",
                "Announcements" => "announcement"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "communication",
            "current_child" => "channels",
            "current_link" => "announcements"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Communication" => "activity_feed",
                "Announcements" => "announcement",
                "New Announcement" => "announcement/new"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "communication",
            "current_child" => "channels",
            "current_link" => "announcements"
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Communication" => "activity_feed",
                "Announcements" => "announcement",
                "Edit Announcement ~ " . $object->getSubject() => "announcement/" . $object->getId() . "/edit",
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "communication",
            "current_child" => "channels",
            "current_link" => "announcements"
        );
    }

    public function showBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Communication" => "activity_feed",
                "Announcements" => "announcement",
                "Announcement ~ " . $object->getSubject() => "announcement/" . $object->getSlug(),
            )
        );
    }

    public function showLinks() {
        return array(
            "current_parent" => "communication",
            "current_child" => "channels",
            "current_link" => "announcements"
        );
    }

}