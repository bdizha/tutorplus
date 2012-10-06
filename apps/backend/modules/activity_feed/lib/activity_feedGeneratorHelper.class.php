<?php

/**
 * activity_feed module helper.
 *
 * @package    ecollegeplus
 * @subpackage activity_feed
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_feedGeneratorHelper extends BaseActivity_feedGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/activity_feed", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/backend.php/activity_feed", array("popup_url" => "/backend.php/activity_feed/" . $object->getId() . "/edit")) . '</li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Dashboard" => "dashboard",
                "Notifications" => "activity_feed",
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "dashboard",
            "current_child" => "my_dashboard",
            "current_link" => "notifications"
        );
    }

}