<?php

require_once dirname(__FILE__) . '/../lib/activity_feedGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/activity_feedGeneratorHelper.class.php';

/**
 * activity_feed actions.
 *
 * @package    ecollegeplus
 * @subpackage activity_feed
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_feedActions extends autoActivity_feedActions
{

    public function executeIndex(sfWebRequest $request)
    {
        $this->activityFeeds = array();
        $activityFeeds = ActivityFeedTable::getInstance()->retrieveNotificationsByUser($this->getUser()->getId());

        foreach ($activityFeeds as $activityFeed)
        {
            $activity = $activityFeed->toArray();
            $patterns = explode(",", $activityFeed->getActivityTemplate()->getPatterns());
            
            $patterns = array_map(array($this, "padPatterns"), $patterns);

            $replacements = json_decode($activityFeed->getReplacements());
            $content = $activityFeed->getActivityTemplate()->getContent();

            $activity["content"] = preg_replace($patterns, $replacements, $content);
            $this->activityFeeds[] = $activity;
        }
    }

    public function padPatterns($pattern)
    {
        return "/" . $pattern . "/";
    }

}
