<?php

/**
 * tpFaq module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpFaq
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpFaqGeneratorHelper extends BaseTpFaqGeneratorHelper
{    

    public function getBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "Faqs" => "faq"
            )
        );
    }

    public function getLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "faqs"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "Faqs" => "faq",
                "New Faq" => "faq/new"
            )
        );
    }

    public function getNewLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "faqs"
        );
    }

    public function getEditBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "Faqs" => "faq",
                "Edit Faq" => "faq/" . $object->getId() . "edit"
            )
        );
    }

    public function getEditLinks() {
        return array(
            "currentParent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "faqs"
        );
    }
}