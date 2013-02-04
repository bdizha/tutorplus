<?php

require_once dirname(__FILE__) . '/../lib/activity_feedGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/activity_feedGeneratorHelper.class.php';

/**
 * activity_feed actions.
 *
 * @package    tutorplus
 * @subpackage activity_feed
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_feedActions extends autoActivity_feedActions {
    
    public function preExecute() {
        parent::preExecute();
        $this->profileId = $this->getUser()->getMyAttribute('profile_show_id', null);
        $this->profile = ProfileTable::getInstance()->findOneById($this->profileId);
        $this->indexActivityFeeds = ActivityFeedTable::getInstance()->findByProfileIdAndType($this->profileId, ActivityFeedTable::TYPE_POSTED_DISCUSSION_GROUP);
        $this->groupActivityFeeds = ActivityFeedTable::getInstance()->findByProfileIdAndType($this->profileId, ActivityFeedTable::TYPE_POSTED_DISCUSSION_GROUP);
        $this->topicActivityFeeds = ActivityFeedTable::getInstance()->findByProfileIdAndType($this->profileId, ActivityFeedTable::TYPE_POSTED_DISCUSSION_TOPIC);
        $this->postActivityFeeds = ActivityFeedTable::getInstance()->findByProfileIdAndType($profileId, ActivityFeedTable::TYPE_POSTED_DISCUSSION_POST);
    }

    public function executeIndex(sfWebRequest $request) {
    }

    /**
     * Executes groups action
     *
     * @param sfRequest $request A request object
     */
    public function executeGroups(sfWebRequest $request) {
    }

    /**
     * Executes topics action
     *
     * @param sfRequest $request A request object
     */
    public function executeTopics(sfWebRequest $request) {
    }

    /**
     * Executes posts action
     *
     * @param sfRequest $request A request object
     */
    public function executePosts(sfWebRequest $request) {
        $primaryDiscussionGroup = DiscussionGroupTable::getInstance()->findOrCreatePrimaryDiscussionGroupByProfile($this->profile);
        $this->primaryDiscussionTopic = DiscussionTopicTable::getInstance()->findOrCreateOneByProfileId($this->profile->getId(), $primaryDiscussionGroup->getId());
        $this->discussionCommentForm = new DiscussionCommentForm();
        $this->discussionPostForm = new DiscussionPostForm();
        $this->discussionPostForm->setDefaults(array(
            "profile_id" => $this->getUser()->getId(),
            "discussion_topic_id" => $this->primaryDiscussionTopic->getId()
        ));
    }

}
