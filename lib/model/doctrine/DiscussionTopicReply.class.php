<?php

/**
 * DiscussionTopicReply
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ecollegeplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class DiscussionTopicReply extends BaseDiscussionTopicReply {

    public function updateCounts() {
        $this->getDiscussionTopicMessage()->getDiscussionTopic()->setNbReplies($this->getDiscussionTopicMessage()->getDiscussionTopic()->getNbReplies() + 1);
        $this->getDiscussionTopicMessage()->getDiscussionTopic()->setLatestTopicReplyId($this->getId());
        $this->getDiscussionTopicMessage()->getDiscussionTopic()->setUpdatedAt($this->getCreatedAt());
        $this->getDiscussionTopicMessage()->getDiscussionTopic()->save();

        $this->getDiscussionTopicMessage()->getDiscussionTopic()->getDiscussion()->setNbReplies($this->getDiscussionTopicMessage()->getDiscussionTopic()->getDiscussion()->getNbReplies() + 1);
        $this->getDiscussionTopicMessage()->getDiscussionTopic()->getDiscussion()->setNbTopics($this->getDiscussionTopicMessage()->getDiscussionTopic()->getDiscussion()->getNbTopics() + 1);
        $this->getDiscussionTopicMessage()->getDiscussionTopic()->getDiscussion()->setLatestTopicReplyId($this->getId());
        $this->getDiscussionTopicMessage()->getDiscussionTopic()->getDiscussion()->setUpdatedAt($this->getCreatedAt());
        $this->getDiscussionTopicMessage()->getDiscussionTopic()->getDiscussion()->save();
    }

    public function postSave($event) {
        // update counts
        $this->updateCounts();

        // save this activity
        $replacements = array(
            $this->getDiscussionTopicMessage()->getUser()->getName(),
            $this->getDiscussionTopicMessage()->getUserId(),
            $this->getDiscussionTopicMessage()->getDiscussionTopic()->getSubject(),
            $this->getDiscussionTopicMessage()->getDiscussionTopicId(),
            myToolkit::shortenString($this->getReply())
        );
        $activityTemplate = ActivityTemplateTable::getInstance()->findOneByType(ActivityTemplateTable::TYPE_POSTED_DISCUSSION_REPLY);

        if ($activityTemplate) {
            $activityFeed = new ActivityFeed();
            $activityFeed->setActivityTemplate($activityTemplate);
            $activityFeed->setReplacements(json_encode($replacements));
            $activityFeed->save();
        }
    }

}