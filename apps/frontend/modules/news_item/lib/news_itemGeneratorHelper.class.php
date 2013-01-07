<?php

/**
 * news_item module helper.
 *
 * @package    tutorplus.org
 * @subpackage news_item
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class news_itemGeneratorHelper extends BaseNews_itemGeneratorHelper {

    public function indexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Timeline" => "activity_feed",
                "News Items" => "news_item"
            )
        );
    }

    public function indexLinks() {
        return array(
            "current_parent" => "timeline",
            "current_child" => "timeline",
            "current_link" => "news_items"
        );
    }

    public function newBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Timeline" => "activity_feed",
                "News Items" => "news_item",
                "New NewsItem" => "news_item/new"
            )
        );
    }

    public function newLinks() {
        return array(
            "current_parent" => "timeline",
            "current_child" => "timeline",
            "current_link" => "news_items"
        );
    }

    public function editBreadcrumbs($object) {
        return array('breadcrumbs' => array(
                "Timeline" => "activity_feed",
                "News Items" => "news_item",
                "Edit NewsItem ~ " . $object->getHeading() => "news_item/" . $object->getId() . "/edit",
            )
        );
    }

    public function editLinks() {
        return array(
            "current_parent" => "timeline",
            "current_child" => "timeline",
            "current_link" => "news_items"
        );
    }

    public function linkToNewsItemEdit($object, $params) {
        return link_to(__('Edit', array(), 'sf_admin'), "/news/item/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToNewsItemDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'news_item_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function linkToNewsItemNew() {
        return '<input id="new_course_news_item" type="button" class="button" onClick="document.location.href=\'/news/item/new\'" value="+ Add News Item">';
    }

}