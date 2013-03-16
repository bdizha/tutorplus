<?php

/**
 * tpEmailTemplate module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpEmailTemplate
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpEmailTemplateGeneratorHelper extends BaseTpEmailTemplateGeneratorHelper
{   

    public function getBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "email_template"
            )
        );
    }

    public function getLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "email_templates"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "profile_Discussions",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "email_template"
            )
        );
    }

    public function getNewLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "email_templates"
        );
    }

    public function getEditBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Setting" => "profile_Discussions",
                "Communication Settings" => "communication_settings",
                "Email Templates" => "email_template",
                "Edit Email Template ~ " . $object->getSubject() => "email/template/" . $object->getId() . "/edit",
            )
        );
    }

    public function getEditLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "email_templates"
        );
    }
}