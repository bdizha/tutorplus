<?php

/**
 * activity_template module helper.
 *
 * @package    tutorplus
 * @subpackage activity_template
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_templateGeneratorHelper extends BaseActivity_templateGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Communication Settings" => "communication_settings",
                "Activity Templates" => "activity_template"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "activity_templates",
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Communication Settings" => "communication_settings",
                "Activity Templates" => "activity_template",
                "New" => "activity/template/new"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "activity_templates",
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Settings" => "course",
                "Communication Settings" => "communication_settings",
                "Activity Templates" => "activity_template",
                "Edit" => "activity/template/" . $object->getId() . "/edit"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "activity_templates",
        );
    }

}
