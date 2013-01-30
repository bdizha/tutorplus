<?php

/**
 * DiscussionGroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tutorplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class DiscussionGroup extends BaseDiscussionGroup {

  public function getAccessType() {
    $accessLevels = "";

    if (isset(DiscussionGroupTable::$access_levels[parent::_get("access_level")])) {
      $accessLevels = DiscussionGroupTable::$access_levels[parent::_get("access_level")];
    }
    if (is_array($accessLevel = explode(" - ", $accessLevels))) {
      return $accessLevel[0];
    } else {
      return $accessLevels;
    }
  }

  /**
   * Save the group peer
   */
  public function saveGroupOwner($profile_id = null, $username = "") {
    $DiscussionPeer = new DiscussionPeer();
    $DiscussionPeer->setNickname(strtolower($username));
    $DiscussionPeer->setProfileId($profile_id);
    $DiscussionPeer->setDiscussionGroupId($this->getId());
    $DiscussionPeer->setMembershipType(2);
    $DiscussionPeer->save();
  }

  public function retrievePeers($isRemoved = 0) {
    return DiscussionPeerTable::getInstance()->retrievePeers($this->getId(), $isRemoved);
  }

  public function getPeerByProfileId($profileId) {
    return DiscussionPeerTable::getInstance()->getPeersByDiscussionGroupIdAndProfileId($this->getId(), $profileId);
  }

  public function getCourse() {
    $courseDiscussionGroup = CourseDiscussionGroupTable::getInstance()->findOneByDiscussionGroupId($this->getId());
    if (is_object($courseDiscussionGroup)) {
      return $courseDiscussionGroup->getCourse();
    }
    return null;
  }

  public function getToEmails() {
    $toEmails = "";
    foreach (ProfileTable::getInstance()->findAll() as $user) {
      $toEmails .= $user->getName() . " <" . $user->getEmail() . ">,";
    }

    $toEmails = trim($toEmails, ",");
    return $toEmails;
  }

  public function hasJoined($profileId) {
    return is_object(DiscussionPeerTable::getInstance()->findOneByDiscussionGroupIdAndProfileId($this->getId(), $profileId));
  }

  public function postInsert($event) {
    // save this activity
    $activityFeed = new ActivityFeed();
    $activityFeed->setProfileId($this->getProfileId());
    $activityFeed->setItemId($this->getId());
    $activityFeed->setType(ActivityFeedTable::TYPE_POSTED_DISCUSSION_GROUP);
    $activityFeed->save();

    // link this activity with the current profile
    $profileActivityFeed = new ProfileActivityFeed();
    $profileActivityFeed->setProfileId($this->getProfileId());
    $profileActivityFeed->setActivityFeedId($activityFeed->getId());
    $profileActivityFeed->save();
  }

}