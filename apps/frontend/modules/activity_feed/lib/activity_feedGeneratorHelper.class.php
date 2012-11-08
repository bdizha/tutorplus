<?php

/**
 * activity_feed module helper.
 *
 * @package    tutorplus
 * @subpackage activity_feed
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_feedGeneratorHelper extends BaseActivity_feedGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/activity_feed", array()) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<li class="sf_admin_action_edit">' . link_to(__('<img src="/images/icons/14x14/edit.png" title="Edit" alt="Edit">', array(), 'sf_admin'), "/activity_feed", array("popup_url" => "/activity_feed/" . $object->getId() . "/edit")) . '</li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Communication" => "activity_feed",
                "Notifications" => "activity_feed"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "communication",
            "current_child" => "channels",
            "current_link" => "notifications"
        );
    }

}