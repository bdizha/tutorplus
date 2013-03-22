<?php

/**
 * tpProfile module helper.
 *
 * @package    tutorplus.org
 * @subpackage tpProfile
 * @author     Batanayi Matuku
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpProfileGeneratorHelper extends BaseTpProfileGeneratorHelper
{

    public function getLinks()
    {
        $sfUser = sfContext::getInstance()->getUser();
        $profileId = $sfUser->getMyAttribute('profile_show_id', null);
        return array(
            "currentParent" => "profile",
            "current_child" => "my_profile",
            "current_link" => "my_info",
            "slug" => $sfUser->getProfile()->getSlug(),
            "id" => $sfUser->getProfile()->getId(),
            "ignore" => !$sfUser->isCurrent($profileId)
        );
    }

    public function getShowBreadcrumbs()
    {
        $sfUser = sfContext::getInstance()->getUser();
        return array('breadcrumbs' => array(
                "Profile" => $sfUser->getProfile()->getSlug(),
                "Profile Info" => ""
            )
        );
    }

    public function getEditBreadcrumbs($object)
    {
        $sfUser = sfContext::getInstance()->getUser();
        return array('breadcrumbs' => array(
                "Profile" => $sfUser->getProfile()->getSlug(),
                "Account Settings" => ""
            )
        );
    }

    public function getEditLinks()
    {
        $sfUser = sfContext::getInstance()->getUser();
        return array(
            "currentParent" => "profile",
            "current_child" => "my_settings",
            "current_link" => "account_settings",
            "slug" => $sfUser->getProfile()->getSlug(),
            "id" => $sfUser->getProfile()->getId(),
            "ignore" => !$sfUser->isCurrent($sfUser->getId())
        );
    }

    public function getDiscussionsBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Discussions" => "profile_timeline"
            )
        );
    }

    public function getTopicsBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Peers" => "my_peers"
            )
        );
    }

    public function getPostsBreadcrumbs()
    {
        return array('breadcrumbs' => array(
                "Profile" => "profile_timeline",
                "Peers" => "my_peers"
            )
        );
    }

    public function getTabs($activeTab, $profile, $activityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds, $peers)
    {
        $tabs = array(
            "posts" => array(
                "label" => "Shared Posts",
                "href" => "/" . $profile->getSlug(),
                "count" => $postActivityFeeds->count()
            ),
            "peers" => array(
                "label" => "Peers",
                "href" => "/profile/peers",
                "count" => $peers->count()
            ),
            "topics" => array(
                "label" => "Topics",
                "href" => "/profile/topics",
                "count" => $topicActivityFeeds->count()
            ),
            "discussions" => array(
                "label" => "Discussions",
                "href" => "/profile/discussions",
                "count" => $groupActivityFeeds->count()
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

        return array("tabs" => $tabs);
    }

    public function linkToCancel($object, $params)
    {
        return '<input class="cancel" type="button" value="Cancel" onclick="document.location.href=\'/' . $object->getSlug() . '\'"/>';
    }

    public function linkToDone($object, $params)
    {
        return '<input class="done" type="button" value="Done" onclick="document.location.href=\'/' . $object->getSlug() . '\'"/>';
    }

}