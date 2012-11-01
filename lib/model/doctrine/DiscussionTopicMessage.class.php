<?php

/**
 * DiscussionTopicMessage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ecollegeplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class DiscussionTopicMessage extends BaseDiscussionTopicMessage {

    public function postSave($event) {
        // save this activity
        $replacements = array(
            $this->getUser()->getName(),
            $this->getUser()->getSlug(),
            $this->getDiscussionTopic()->getSlug(),
            myToolkit::shortenString($this->getDiscussionTopic()->getSubject(), 50),
            myToolkit::shortenString($this->getMessage(), 50),
        );

        $activityTemplate = ActivityTemplateTable::getInstance()->findOneByType(ActivityTemplateTable::TYPE_POSTED_DISCUSSION_MESSAGE);

        if ($activityTemplate) {
            $activityFeed = new ActivityFeed();
            $activityFeed->setActivityTemplate($activityTemplate);
            $activityFeed->setReplacements(json_encode($replacements));
            $activityFeed->setUserId($this->getUserId());
            $activityFeed->save();

            // link this activity with the current discussion users
            foreach ($this->getDiscussionTopic()->getDiscussion()->getMembers() as $discussionMember) {
                $activityFeedUser = new UserActivityFeed();
                $activityFeedUser->setUserId($discussionMember->getUserId());
                $activityFeedUser->setActivityFeedId($activityFeed->getId());
                $activityFeedUser->save();
            }
        }
    }   
    
    public function getHtmlizedMessage(){
        return myToolkit::htmlString($this->getMessage());
    }


}
