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
class discussion_peerActions extends autoDiscussion_peerActions
{

    public function preExecute()
    {
        parent::preExecute();
        $discussionId = $this->getUser()->getMyAttribute('discussion_show_id', null);
        $this->redirectUnless($discussionId, "@discussion");
        $this->discussion = DiscussionTable::getInstance()->find($discussionId);
        $this->course = $this->discussion->getCourseDiscussion()->getCourse();
        if ($this->course->getId()) {
            $this->helper->setCourse($this->course);
            $this->getUser()->setMyAttribute('course_show_id', $this->course->getId());
        }
        $this->discussionPeer = DiscussionPeerTable::getInstance()->findOneByDiscussionIdAndProfileId($this->discussion->getId(), $this->getUser()->getId());
        $this->myPeers = PeerTable::getInstance()->findByProfileId($this->getUser()->getId());
        $this->helper->setDiscussion($this->discussion);
        $this->forward404Unless($this->discussion);
    }

    public function beforeExecute()
    {
        $course = $this->discussion->getCourseDiscussion()->getCourse();
        if ($course->getId()) {
            $this->course = $course;
            $this->getUser()->setMyAttribute('course_show_id', $course->getId());
        } else {
            $this->course = null;
        }
    }

    public function executeIndex(sfWebRequest $request)
    {
        $this->beforeExecute();

        // get all discussion peers
        $this->discussionPeers = $this->discussion->getPeers();
    }

    public function executePeers(sfWebRequest $request)
    {
        $this->beforeExecute();
    }

    public function executeInvite(sfWebRequest $request)
    {
        $discussionId = $this->getUser()->getMyAttribute('discussion_show_id', null);
        $this->discussionPeerIds = array();
        if ($request->getMethod() == "POST") {
            try {
                $peers = $request->getParameter('peers');

                // save peers
                $this->discussionPeerIds = $this->savePeerInvitations($discussionId, $peers);

                // send invitation emails
                // $this->sendPeerInvitations($form, $peers);
            } catch (Doctrine_Validator_Exception $e) {
                
            }
        } else {
            // fetch the current discussion peers
            $this->discussionPeerIds = ProfileTable::getInstance()->retrieveProfileIdsByDiscussionId($discussionId);
        }
    }

    protected function savePeerInvitations($discussionId, $postedPeerIds = array())
    {
        // fetch the current discussion peers
        $discussionPeerIds = ProfileTable::getInstance()->retrieveProfileIdsByDiscussionId($discussionId);

        // make sure a profile can only manage their own peers
        $myDiscussionPeerIds = array();
        $peers = array();
        foreach ($this->myPeers as $myPeer) {
            $peers[] = array("invitee" => $myPeer->getInviteeId(), "inviter" => $myPeer->getInviterId());
            if (in_array($myPeer->getInviteeId(), $discussionPeerIds)) {
                $myDiscussionPeerIds[] = $myPeer->getInviteeId();
            }

            if (in_array($myPeer->getInviterId(), $discussionPeerIds)) {
                $myDiscussionPeerIds[] = $myPeer->getInviterId();
            }
        }

        // determine what do delete
        $toDelete = array_diff($myDiscussionPeerIds, $postedPeerIds);
        if (count($toDelete)) {
            DiscussionPeerTable::getInstance()->deleteByProfileIdsAndDiscussionId($toDelete, $discussionId);
            $this->getUser()->setFlash("notice", "Your discussion peers were managed successfully!");
        }

        // determine what do add
        $toAdd = array_diff($postedPeerIds, $myDiscussionPeerIds);
        if (count($toAdd)) {
            $profiles = ProfileTable::getInstance()->findByIds($toAdd);
            foreach ($profiles as $profile) {
                // make sure we don't add a peer twice
                if (!in_array($profile->getId(), $discussionPeerIds)) {
                    $profileId = $profile->getId();
                    if ($this->discussion->hasProfile($profileId)) {
                        $discussionPeer = DiscussionPeerTable::getInstance()->findOneByDiscussionIdAndProfileId($discussionId, $profileId);
                        $discussionPeer->setIsRemoved(false);
                        $discussionPeer->save();
                    } else {
                        $discussionPeer = new DiscussionPeer();
                        $discussionPeer->setNickname(strtolower($profile->getFirstName()));
                        $discussionPeer->setStatus(DiscussionPeerTable::MEMBERSHIP_TYPE_ORDINARY);
                        $discussionPeer->setDiscussionId($discussionId);
                        $discussionPeer->setProfileId($profile->getId());
                        $discussionPeer->save();
                    }
                }
            }
            $this->getUser()->setFlash("notice", "Your discussion peers were managed successfully!");
        }

        if (!count($toAdd) && !count($toDelete)) {
            $this->getUser()->setFlash("notice", "No changes could be applied upon discussion!");
        }
        return $postedPeerIds;
    }

    public function executeAccept(sfWebRequest $request)
    {
        try {
            $profileId = $request->getParameter("profile_id");
            $profile = ProfileTable::getInstance()->find($profileId);

            if (!$this->discussion->hasProfile($profileId)) {
                $discussionPeer = new DiscussionPeer();
                $discussionPeer->setNickname(strtolower($profile->getFirstName()));
                $discussionPeer->setProfileId($profileId);
                $discussionPeer->setDiscussionId($this->discussion->getId());
                $discussionPeer->save();

                echo "{$profile->getName()} has been added to this discussion successfully.";
            } else {
                echo "It seems {$profile->getName()}'s already joined this discusison!";
            }
        } catch (Exception $e) {
            echo "User could not be subscribed to this discussion.";
        }
    }

}
