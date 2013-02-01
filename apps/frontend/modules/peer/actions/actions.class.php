<?php

require_once dirname(__FILE__) . '/../lib/peerGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/peerGeneratorHelper.class.php';

/**
 * peer actions.
 *
 * @package    tutorplus
 * @subpackage peer
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class peerActions extends autoPeerActions {

    public function preExecute() {
        $this->profile = $this->getUser()->getProfile();

        // suggest this profile some peers
        $this->profile->suggestPeers();
        parent::preExecute();
    }

    public function executeStudents(sfWebRequest $request) {
        $this->studentPeers = PeerTable::getInstance()->findByProfileIdAndIsInstructor($this->profile->getId(), false);
    }

    public function executeInstructors(sfWebRequest $request) {
        $this->instructorPeers = PeerTable::getInstance()->findByProfileIdAndIsInstructor($this->profile->getId(), true);
    }

    public function executeFind(sfWebRequest $request) {
        $this->potentialPeers = PeerTable::getInstance()->findByNotProfileId($this->profile->getId());
    }

    public function executeSuggested(sfWebRequest $request) {
        $this->suggestedPeers = PeerTable::getInstance()->findSuggestedByProfileId($this->profile->getId());
    }

    public function executeInvite(sfWebRequest $request) {
        $inviteeId = $request->getParameter("invitee_id");
        $inviterId = $request->getParameter("inviter_id");
        if ($inviteeId & $inviterId) {
            // check if this pair is already peered up
            $peer = PeerTable::getInstance()->findOneByPeers($inviterId, $inviteeId);
            if (is_object($peer)) {
                if ($this->profile->getId() != $peer->getInviterId()) {
                    
                    $tempId = $inviteeId;
                    $inviteeId = $inviterId;
                    $inviterId = $tempId;
                    
                    // get rid of this peer
                    $peer->delete();

                    // create new peer
                    $peer = new Peer();
                }
            } else {
                // create new peer
                $peer = new Peer();
            }

            $peer->setInviteeId($inviteeId);
            $peer->setInviterId($inviterId);
            $peer->setStatus(PeerTable::STATUS_INVITED);
            $peer->save();

            $this->getUser()->setFlash('notice', 'Peer invitation has been sent successfully.');
            die("success");
        }
        die("failure");
    }

    public function executeAccept(sfWebRequest $request) {
        $inviterId = $request->getParameter("inviter_id");
        if ($inviterId) {
            $inviteeId = $this->profile->getId();

            // make sure these peers are already linked
            $peer = PeerTable::getInstance()->findOneByPeers($inviterId, $inviteeId);
            if (!is_object($peer)) {
                $peer = new Peer();
                $peer->setInviteeId($inviteeId);
                $peer->setInviterId($inviterId);
                $peer->setStatus(PeerTable::STATUS_INVITED);
                $peer->save();

                $this->getUser()->setFlash('notice', 'Peer invitation has been sent successfully.');
                die("success");
            } else {
                $peer->setStatus(PeerTable::STATUS_PEERED);
                $peer->save();

                $this->getUser()->setFlash('notice', 'You\'ve accepted your peer invitation successfully.');
                die("success");
            }
        }
        die("failure");
    }

}
