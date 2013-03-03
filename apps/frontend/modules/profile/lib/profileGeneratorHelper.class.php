<?php

/**
 * profile module helper.
 *
 * @package    tutorplus
 * @subpackage profile
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileGeneratorHelper extends BaseProfileGeneratorHelper {

    public function allLinks() {
        $sfUser = sfContext::getInstance()->getUser();
        $profileId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "currentParent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_info",
            "slug" => $sfUser->getProfile()->getSlug(),
            "ignore" => !$sfUser->isCurrent($profileId)
        );
    }

    public function getShowBreadcrumbs() {
        $sfUser = sfContext::getInstance()->getUser();
        return array('breadcrumbs' => array(
                "Profile" => "profile_show",
                "Public Info" => "profile/" . $sfUser->getProfile()->getSlug()
            )
        );
    }

    public function getGroupsBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "DiscussionGroups" => "profile_timeline"
            )
        );
    }

    public function getTopicsBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Peers" => "my_peers"
            )
        );
    }

    public function getPostsBreadcrumbs() {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Peers" => "my_peers"
            )
        );
    }

    public function getTabs($activeTab, $profile, $activityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds) {
        $tabs = array(
            "posts" => array(
                "label" => "Shared Posts",
                "href" => "/" . $profile->getSlug(),
                "count" => $postActivityFeeds->count()
            ),
            "groups" => array(
                "label" => "Groups",
                "href" => "/profile/groups",
                "count" => $groupActivityFeeds->count()
            ),
            "topics" => array(
                "label" => "Topics",
                "href" => "/profile/topics",
                "count" => $topicActivityFeeds->count()
            ),
            "activity_feeds" => array(
                "label" => "Activity Feeds",
                "href" => "/profile/activity/feeds",
                "count" => $activityFeeds->count()
            )
        );

        if (isset($tabs[$activeTab])) {
            $tabs[$activeTab]["is_active"] = true;
        }

        return $tabs;
    }

}