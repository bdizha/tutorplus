<?php

/**
 * mailing_list module helper.
 *
 * @package    tutorplus
 * @subpackage mailing_list
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mailing_listGeneratorHelper extends BaseMailing_listGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "mailing_list"
            )
        );
    }

    public function indexLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "mailing_lists",
            "is_profile" => true
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "mailing_list"
            )
        );
    }

    public function getNewLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "mailing_lists",
            "is_profile" => true
        );
    }

    public function getEditBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "mailing_list"
            )
        );
    }

    public function getEditLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "mailing_lists",
            "is_profile" => true
        );
    }

}