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

  public function executeIndex(sfWebRequest $request) {
    $primaryDiscussion = DiscussionTable::getInstance()->findOrCreatePrimaryDiscussionByProfileId($this->getUser()->getProfile());
    $this->primaryDiscussionTopic = DiscussionTopicTable::getInstance()->findOrCreateOneByProfileId($this->getUser()->getId(), $primaryDiscussion->getId());

    $this->activityFeeds = ActivityFeedTable::getInstance()->findByProfileId($this->getUser()->getId());
    $this->replyForm = new DiscussionCommentForm();
    $this->messageForm = new DiscussionPostForm();
    $this->messageForm->setDefaults(array(
        "profile_id" => $this->getUser()->getId(),
        "discussion_topic_id" => $this->primaryDiscussionTopic->getId()
    ));
  }

}
