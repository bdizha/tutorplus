<?php

/**
 * dashboard actions.
 *
 * @package    tutorplus
 * @subpackage dashboard
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions {

    public function preExecute() {
        $this->helper = new dashboardGeneratorHelper();
        $this->profile = $this->getUser()->getProfile();
        
        // suggest this profile some peers
        $this->profile->suggestPeers();
        parent::preExecute();
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->totalInboxCount = EmailMessageTable::getInstance()->countInboxByEmail($this->getUser()->getEmail());
        $this->activityFeeds = ActivityFeedTable::getInstance()->findByProfileId($this->profile->getId(), 3);
        
        
//        myToolkit::debug($this->activityFeeds->toArray());
        
        
        $this->courses = CourseTable::getInstance()->findByPeerId($this->profile->getId(), 3);
        $this->discussions = DiscussionTable::getInstance()->findPopularDiscussionsByProfileId($this->profile->getId());
        $this->announcements = AnnouncementTable::getInstance()->findLatest(20);
        $this->newsItems = NewsItemTable::getInstance()->findLatest(3);
        $this->peers = PeerTable::getInstance()->findByProfileId($this->getUser()->getId());
        $this->suggestedPeers = PeerTable::getInstance()->findByProfileIdAndStatus($this->profile->getId(), PeerTable::STATUS_SUGGESTED);
        $this->requestedPeers = PeerTable::getInstance()->findByInviteeIdAndStatus($this->profile->getId(), PeerTable::STATUS_REQUESTED);
    }

}