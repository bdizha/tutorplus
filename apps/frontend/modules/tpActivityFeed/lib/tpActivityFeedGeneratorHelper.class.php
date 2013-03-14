<?php

/**
 * tpActivityFeed module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpActivityFeed
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpActivityFeedGeneratorHelper extends BaseTpActivityFeedGeneratorHelper
{

    public function getIndexBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Timeline" => "activity_feed",
                "Activity Feeds" => "activity_feed"
            )
        );
    }

    public function getAllLinks()
    {
        return array(
            "currentParent" => "timeline",
            "current_child" => "timeline",
            "current_link" => "activity_feeds"
        );
    }

    public function getTabs($activeTab, $indexActivityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds)
    {
        $tabs = array(
            "posts" => array(
                "label" => "Posts",
                "href" => "/activity/feed/posts",
                "count" => $postActivityFeeds->count()
            ),
            "groups" => array(
                "label" => "Discussions",
                "href" => "/activity/feed/discussions",
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