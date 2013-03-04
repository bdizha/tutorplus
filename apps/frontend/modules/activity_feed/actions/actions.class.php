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
        $this->profile = $this->getUser()->getProfile();
        $this->indexActivityFeeds = ActivityFeedTable::getInstance()->findByProfileId($this->profile->getId(), 20);
        $this->groupActivityFeeds = ActivityFeedTable::getInstance()->findByProfileIdAndType($this->profile->getId(), ActivityFeedTable::TYPE_DISCUSSION_CREATED, 20);
        $this->topicActivityFeeds = ActivityFeedTable::getInstance()->findByProfileIdAndType($this->profile->getId(), ActivityFeedTable::TYPE_DISCUSSION_TOPIC_SUBMITTED, 20);
        $this->postActivityFeeds = ActivityFeedTable::getInstance()->findByProfileIdAndType($this->profile->getId(), ActivityFeedTable::TYPE_DISCUSSION_POST_SUBMITTED, 20);
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
        $primaryDiscussion = DiscussionTable::getInstance()->findOrCreatePrimaryDiscussionByProfile($this->profile);
        $this->primaryDiscussionTopic = DiscussionTopicTable::getInstance()->findOrCreateOneByProfileId($this->profile->getId(), $primaryDiscussion->getId());
        $this->discussionCommentForm = new DiscussionCommentForm();
        $this->discussionPostForm = new DiscussionPostForm();
        $this->discussionPostForm->setDefaults(array(
            "profile_id" => $this->getUser()->getId(),
            "discussion_topic_id" => $this->primaryDiscussionTopic->getId()
        ));
    }

}
