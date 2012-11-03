<?php

/**
 * email_template module helper.
 *
 * @package    tutorplus
 * @subpackage email_template
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class email_templateGeneratorHelper extends BaseEmail_templateGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "email_template"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "email_templates",
            "is_profile" => true
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "profile_discussions",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "email_template"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "email_templates",
            "is_profile" => true
        );
    }

    public function editBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "profile_discussions",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "email_template"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "email_templates",
            "is_profile" => true
        );
    }
}