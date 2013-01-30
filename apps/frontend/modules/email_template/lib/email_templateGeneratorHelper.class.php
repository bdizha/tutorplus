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
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "email_templates"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "profile_DiscussionGroups",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "email_template"
            )
        );
    }

    public function newLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "email_templates"
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Setting" => "profile_DiscussionGroups",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "email_template",
                "Edit Email Template ~ " . $object->getSubject() => "email/template/" . $object->getId() . "/edit",
            )
        );
    }

    public function editLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "email_templates"
        );
    }
}