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

    public function getBreadcrumbs($currentTitle = "Activity Feeds", $currentUrl = "timeline")
    {
        $breadcrumbs = array("Timeline" => "/timeline");
        $breadcrumbs[$currentTitle] = $currentUrl;

        return array('breadcrumbs' => $breadcrumbs);
    }

    public function getLinks()
    {
        return array(
            "currentParent" => "timeline",
            "current_child" => "timeline",
            "current_link" => "activity_feeds"
        );
    }

    public function getTabs($activeTab, $indexActivityFeeds, $discussionActivityFeeds, $topicActivityFeeds, $postActivityFeeds)
    {
        $tabs = array(
            "posts" => array(
                "label" => "Posts",
                "href" => "/timeline/posts",
                "count" => $postActivityFeeds->count()
            ),
            "discussions" => array(
                "label" => "Discussions",
                "href" => "/timeline/discussions",
                "count" => $discussionActivityFeeds->count()
            ),
            "topics" => array(
                "label" => "Topics",
                "href" => "/timeline/topics",
                "count" => $topicActivityFeeds->count()
            ),
            "index" => array(
                "label" => "Activity Feeds",
                "href" => "/timeline",
                "count" => $indexActivityFeeds->count()
            )
        );

        if (isset($tabs[$activeTab])) {
            $tabs[$activeTab]["is_active"] = true;
        }

        return array("tabs" => $tabs);
    }

}