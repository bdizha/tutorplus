<?php

/**
 * news module helper.
 *
 * @package    ecollegeplus
 * @subpackage news
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsGeneratorHelper extends BaseNewsGeneratorHelper {

    public function linkToNew($params) {
        return '<li class="sf_admin_action_new">' . button_to(__($params['label'], array(), 'sf_admin'), "/backend.php/news#", array("class" => "new")) . '</li>';
    }

    public function linkToEdit($object, $params) {
        return '<a class="edit" href="/backend.php/news/' . $object->getId() . '/edit">&nbsp;</a>';
    }

    public function linkToDelete($object, $params) {
        return link_to(__('&nbsp;', array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', "class" => "delete", 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm']));
    }

    public function linkToCancel($object, $params) {
        return '<input class="cancel" type="button" ' . '" onclick="document.location.href=\'/backend.php/news\'" value="Cancel"/>';
    }

    public function linkToDone($object, $params) {
        return '<input class="done" type="button" ' . '" onclick="document.location.href=\'/backend.php/news\'" value="Done"/>';
    }

    public function linkToSave($object, $params) {
        return '<li class="sf_admin_action_save"><input class="save" type="button" value="' . __($params['label'], array(), 'sf_admin') . '" /></li>';
    }
    
    public function linkToAnnounce() {
        return '<li class="sf_admin_action_announce"><input type="button" class="button" value="+ Announce"/></li>';
    }

    public function linkToPrevious() {
        return '<li class="sf_admin_action_news"><input type="button" class="button" onclick="window.location=\'/backend.php/news\'" value="< News"/></li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "News" => "news"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "news",
            "is_profile" => true
        );
    }

    public function showBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Setting" => "email_template",
                "Communication Settings" => "communication_settings",
                "News" => "news"
            )
        );
    }

    public function showLinks() {
        return array(
            "current_parent" => "settings",
            "current_child" => "communication_settings",
            "current_link" => "news",
            "is_profile" => true
        );
    }

}