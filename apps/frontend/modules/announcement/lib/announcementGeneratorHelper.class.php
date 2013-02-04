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

    public function linkToAnnouncementEdit($object, $params) {
        return link_to(__('Edit', array(), 'sf_admin'), "/announcement/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToAnnouncementDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'announcement_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }
    
    public function linkToAnnouncementNew(){
        return '<input id="new_course_announcement" type="button" class="button" onClick="document.location.href=\'/announcement/new\'" value="+ Add Announcement">';
    }

}