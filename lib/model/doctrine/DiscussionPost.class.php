<?php

/**
 * DiscussionPost
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tutorplus.org
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class DiscussionPost extends BaseDiscussionPost {

    public function postInsert($event) {        
        $discussion = $this->getDiscussionTopic()->getDiscussion();
        $discussion->setPostCount($discussion->getPostCount() + 1);
        $discussion->setUpdatedAt($this->getCreatedAt());
        $discussion->save();
        
        // save this activity
        $activityFeed = new ActivityFeed();
        $activityFeed->setProfileId($this->getProfileId());
        $activityFeed->setItemId($this->getId());
        $activityFeed->setType(ActivityFeedTable::TYPE_DISCUSSION_POST_SUBMITTED);
        $activityFeed->save();

        // link this activity with the current profile
        $profileActivityFeed = new ProfileActivityFeed();
        $profileActivityFeed->setProfileId($this->getProfileId());
        $profileActivityFeed->setActivityFeedId($activityFeed->getId());
        $profileActivityFeed->save();
    }

}
