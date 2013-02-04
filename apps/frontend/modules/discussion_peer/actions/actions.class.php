<?php

require_once dirname(__FILE__) . '/../lib/discussion_peerGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_peerGeneratorHelper.class.php';

/**
 * discussion_peer actions.
 *
 * @package    tutorplus
 * @subpackage discussion_peer
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_peerActions extends autoDiscussion_peerActions {

    public function preExecute() {
        parent::preExecute();
        $discussionGroupId = $this->getUser()->getMyAttribute('discussion_group_show_id', null);
        $this->redirectUnless($discussionGroupId, "@discussion_group");
        $this->discussionGroup = DiscussionGroupTable::getInstance()->find($discussionGroupId);
        $this->discussionPeer = DiscussionPeerTable::getInstance()->getPeersByDiscussionGroupIdAndProfileId($this->discussionGroup->getId(), $this->getUser()->getId());

        $this->helper->setDiscussionGroup($this->discussionGroup);
        $this->forward404Unless($this->discussionGroup);
    }

    public function beforeExecute() {
        $course = $this->discussionGroup->getCourseDiscussionGroup()->getCourse();
        if ($course->getId()) {
            $this->course = $course;
            $this->getUser()->setMyAttribute('course_show_id', $course->getId());
        } else {
            $this->course = null;
        }
    }

    public function executeIndex(sfWebRequest $request) {
        $this->beforeExecute();
        
        // get all discussion peers
        $this->discussionPeers = $this->discussionGroup->getPeers();
    }

    public function executePeers(sfWebRequest $request) {
        $this->beforeExecute();
    }

    public function executeEdit(sfWebRequest $request) {
        $this->discussion_peer = $this->getRoute()->getObject();
        $this->getUser()->setMyAttribute('discussion_peer_show_id', $this->discussion_peer->getId());
        $this->form = $this->configuration->getForm($this->discussion_peer);
    }

    public function executeInvite(sfWebRequest $request) {
        $discussionGroupId = $this->getUser()->getMyAttribute('discussion_group_show_id', null);
        $this->currentPeerIds = array();
        
        $this->discussionPeers = PeerTable::getInstance()->findByProfileId($this->getUser()->getId());
        if ($request->getMethod() == "POST") {
            try {
                $peers = $request->getParameter('peers');

                // save peers
                $this->currentPeerIds = $this->savePeerInvitations($discussionGroupId, $peers);

                // send invitation emails
                // $this->sendPeerInvitations($form, $peers);
            } catch (Doctrine_Validator_Exception $e) {
                
            }
        } else {
            // fetch the current discussion peers
            $this->currentPeerIds = ProfileTable::getInstance()->retrieveProfileIdsByDiscussionGroupId($discussionGroupId);
        }
    }

    protected function savePeerInvitations($discussionGroupId, $postedPeerIds = array()) {
        // fetch the current discussion peers
        $currentPeerIds = ProfileTable::getInstance()->retrieveProfileIdsByDiscussionGroupId($discussionGroupId);

        
        
        $toDelete = array_diff($currentPeerIds, $postedPeerIds);
        if (count($toDelete)) {
            DiscussionPeerTable::getInstance()->deleteByProfileIdsAndDiscussionGroupId($toDelete, $discussionGroupId);
        }

        $toAdd = array_diff($postedPeerIds, $currentPeerIds);
        
        if (count($toAdd)) {
            $profiles = ProfileTable::getInstance()->findByIds($toAdd);
            foreach ($profiles as $profile) {
                // make sure we don't add a peer twice
                if (!in_array($profile->getId(), $currentPeerIds)) {

                    $profileId = $profile->getId();
                    if ($this->discussionGroup->hasProfile($profileId)) {
                        $discussionPeer = DiscussionPeerTable::getInstance()->findOneByDiscussionGroupIdAndProfileId($discussionGroupId, $profileId);
                        $discussionPeer->setIsRemoved(false);
                        $discussionPeer->save();
                    } else {
                        $discussionPeer = new DiscussionPeer();
                        $discussionPeer->setNickname(strtolower($profile->getFirstName()));
                        $discussionPeer->setStatus(DiscussionPeerTable::MEMBERSHIP_TYPE_ORDINARY);
                        $discussionPeer->setDiscussionGroupId($discussionGroupId);
                        $discussionPeer->setProfileId($profile->getId());
                        $discussionPeer->save();
                    }
                }
            }
        }

        return $postedPeerIds;
    }

    public function executeSuggested(sfWebRequest $request) {

        if ($this->discussionGroup) {
            if ($this->getUser()->getType() == ProfileTable::TYPE_STUDENT) {
                $studentId = $this->getUser()->getStudentId();
                $profileId = $this->getUser()->getId();

                $this->suggestedPeers = DiscussionPeerTable::getInstance()->retrieveSuggestionsByStudentIdAndProfileId($studentId, $profileId, $this->discussionGroup->getId());
            } elseif ($this->getUser()->getType() == ProfileTable::TYPE_INSTRUCTOR) {
                $this->suggestedPeers = null;
            }
        } else {
            die("redirect");
        }
    }

    public function executeAccept(sfWebRequest $request) {
        try {
            $profileId = $request->getParameter("profile_id");
            $profile = ProfileTable::getInstance()->find($profileId);

            if (!$this->discussionGroup->hasProfile($profileId)) {
                $discussionPeer = new DiscussionPeer();
                $discussionPeer->setNickname(strtolower($profile->getFirstName()));
                $discussionPeer->setProfileId($profileId);
                $discussionPeer->setDiscussionGroupId($this->discussionGroup->getId());
                $discussionPeer->save();

                echo "{$profile->getName()} has been added to this discussion successfully.";
            } else {
                echo "It seems {$profile->getName()} is already following this discusison!";
            }
        } catch (Exception $e) {
            echo "User could not be added to this discussion.";
        }
    }

}
