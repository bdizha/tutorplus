<?php

/**
 * activity_feed module helper.
 *
 * @package    tutorplus
 * @subpackage activity_feed
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_feedGeneratorHelper extends BaseActivity_feedGeneratorHelper {

    public function getIndexBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Timeline" => "activity_feed",
                "Activity Feeds" => "activity_feed"
            )
        );
    }

    public function getAllLinks() {
        return array(
            "currentParent" => "timeline",
            "current_child" => "timeline",
            "current_link" => "activity_feeds"
        );
    }

    public function getTabs($activeTab, $indexActivityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds) {
        $tabs = array(
            "posts" => array(
                "label" => "Posts",
                "href" => "/activity/feed/posts",
                "count" => $postActivityFeeds->count()
            ),
            "groups" => array(
                "label" => "Groups",
                "href" => "/activity/feed/groups",
                "count" => $groupActivityFeeds->count()
            ),
            "topics" => array(
                "label" => "Topics",
                "href" => "/activity/feed/topics",
                "count" => $topicActivityFeeds->count()
            ),
            "index" => array(
                "label" => "Activity Feeds",
                "href" => "/activity/feed",
                "count" => $indexActivityFeeds->count()
            )
        );

        if (isset($tabs[$activeTab])) {
            $tabs[$activeTab]["is_active"] = true;
        }

        return $tabs;
    }

}