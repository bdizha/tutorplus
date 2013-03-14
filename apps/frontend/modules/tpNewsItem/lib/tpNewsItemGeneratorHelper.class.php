<?php

/**
 * tpNewsItem module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpNewsItem
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpNewsItemGeneratorHelper extends BaseTpNewsItemGeneratorHelper
{

    public function indexBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Timeline" => "activity_feed",
                "News Items" => "news_item"
            )
        );
    }

    public function indexLinks()
    {
        return array(
            "currentParent" => "timeline",
            "current_child" => "timeline",
            "current_link" => "news_items"
        );
    }

    public function newBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Timeline" => "activity_feed",
                "News Items" => "news_item",
                "New NewsItem" => "news_item/new"
            )
        );
    }

    public function getNewLinks()
    {
        return array(
            "currentParent" => "timeline",
            "current_child" => "timeline",
            "current_link" => "news_items"
        );
    }

    public function getEditBreadcrumbs($object)
    {
        return array('breadcrumbs' => array(
                "Timeline" => "activity_feed",
                "News Items" => "news_item",
                "Edit NewsItem ~ " . $object->getHeading() => "news_item/" . $object->getId() . "/edit",
            )
        );
    }

    public function getEditLinks()
    {
        return array(
            "currentParent" => "timeline",
            "current_child" => "timeline",
            "current_link" => "news_items"
        );
    }

    public function linkToEdit($object, $params)
    {
        return link_to(__('Edit', array(), 'sf_admin'), "/news/item/" . $object->getId() . "/edit", array("class" => "button-edit"));
    }

    public function linkToDelete($object, $params)
    {
        if ($object->isNew()) {
            return '';
        }

        if (!isset($params['type'])) {
            return link_to(__('Remove', array(), 'sf_admin'), 'news_item_delete', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], "class" => "button-remove"));
        } else {
            return '<li class="sf_admin_action_delete">' . link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])) . '</li>';
        }
    }

    public function getTabs($announcements, $newsItems, $activeTab, $newsItem = null)
    {
        $tabs = array(
            "announcements" => array(
                "label" => "Announcements",
                "href" => "/announcement",
                "count" => $announcements->count()
            ),
            "news_items" => array(
                "label" => "News Items",
                "href" => "/news/item",
                "count" => $newsItems->count(),
                "is_active" => $activeTab == "index"
            )
        );

        if ($activeTab == "new") {
            $tabs["new_news_item"] = array(
                "label" => "+ New News Item",
                "href" => "/news/item/new",
                "is_active" => $activeTab == "new"
            );
        } elseif ($activeTab == "edit") {
            $tabs["edit_news_item"] = array(
                "label" => "Edit News Item",
                "href" => "/news/item/" . $newsItem->getId() . "/edit",
                "is_active" => $activeTab == "edit"
            );
        }

        return $tabs;
    }

}