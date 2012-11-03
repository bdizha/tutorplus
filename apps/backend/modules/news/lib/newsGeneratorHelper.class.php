<?php

/**
 * news module helper.
 *
 * @package    tutorplus
 * @subpackage news
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsGeneratorHelper extends BaseNewsGeneratorHelper {

    public function linkToPrevious() {
        return '<li class="sf_admin_action_news"><input type="button" class="button" onclick="window.location=\'/backend.php/news\'" value="< News"/></li>';
    }

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Communication" => "activity_feed",
                "News Items" => "news"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "communication",
            "current_child" => "channels",
            "current_link" => "news"
        );
    }

    public function showBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Communication" => "news",
                "News Items" => "news",
                "News Item ~ " . $object->getHeading() => "news/" . $object->getSlug(),
            )
        );
    }

    public function showLinks() {
        return array(
            "current_parent" => "communication",
            "current_child" => "channels",
            "current_link" => "news"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Communication" => "news",
                "News Items" => "news"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "communication",
            "current_child" => "channels",
            "current_link" => "news"
        );
    }

    public function editBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Communication" => "news",
                "News" => "news"
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "communication",
            "current_child" => "channels",
            "current_link" => "news"
        );
    }

}