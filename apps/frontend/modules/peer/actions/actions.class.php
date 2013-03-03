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
		$this->studentPeers = PeerTable::getInstance()->findByProfileIdAndIsInstructor($this->profile->getId(), false);
		$this->instructorPeers = PeerTable::getInstance()->findByProfileIdAndIsInstructor($this->profile->getId(), true);
		$this->suggestedPeers = PeerTable::getInstance()->findByProfileIdAndStatus($this->profile->getId(), PeerTable::STATUS_SUGGESTED);
		$this->requestingPeers = PeerTable::getInstance()->findByInviteeIdAndStatus($this->profile->getId(), PeerTable::STATUS_REQUESTED);
		$this->invitedPeers = PeerTable::getInstance()->findByInviterIdAndStatus($this->profile->getId(), PeerTable::STATUS_REQUESTED);
		$this->potentialPeers = PeerTable::getInstance()->findByNotProfileId($this->profile->getId());
		parent::preExecute();
	}

	public function executeStudents(sfWebRequest $request) {

	}

	public function executeInstructors(sfWebRequest $request) {

	}

	public function executeSuggested(sfWebRequest $request) {

	}

	public function executeRequests(sfWebRequest $request) {

	}

	public function executeInvitations(sfWebRequest $request) {

	}

	public function executeFind(sfWebRequest $request) {

	}

	public function executeInvite(sfWebRequest $request) {
		$inviteeId = $request->getParameter("invitee_id");
		$inviterId = $request->getParameter("inviter_id");
		$response = array();
		$response["status"] = '';
		$response["notice"] = '';

		try {
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
				$peer->setStatus(PeerTable::STATUS_REQUESTED);
				$peer->save();

				// save this activity
				$activityFeed = new ActivityFeed();
				$activityFeed->setProfileId($inviteeId);
				$activityFeed->setItemId($peer->getId());
				$activityFeed->setType(ActivityFeedTable::TYPE_PEER_INVITED);
				$activityFeed->save();

				// link this activity with the current profile
				$profileActivityFeed = new ProfileActivityFeed();
				$profileActivityFeed->setProfileId($inviteeId);
				$profileActivityFeed->setActivityFeedId($activityFeed->getId());
				$profileActivityFeed->save();

				$response["notice"] = 'Peer invitation has been sent successfully.';
				$response["status"] = 'success';
			}
			else{
				$response["status"] = 'failure';
			}
		} catch (Exception $e) {
			$response["status"] = 'failure';
			$response["notice"] = 'Oops, an error has occurred and been sent to our support team.';
		}
		die(json_encode($response));
	}

	public function executeAccept(sfWebRequest $request) {
		$inviterId = $request->getParameter("inviter_id");
		$response = array();
		$response["status"] = '';
		$response["notice"] = '';

		try {
			if ($inviterId) {
				$inviteeId = $this->profile->getId();

				// save this activity
				$activityFeed = new ActivityFeed();
				$activityFeed->setProfileId($inviteeId);

				// make sure these peers are already linked
				$peer = PeerTable::getInstance()->findOneByPeers($inviterId, $inviteeId);
				if (!is_object($peer)) {
					$peer = new Peer();
					$peer->setInviteeId($inviteeId);
					$peer->setInviterId($inviterId);
					$peer->setStatus(PeerTable::STATUS_REQUESTED);
					$peer->save();

					$activityFeed->setItemId($peer->getId());
					$activityFeed->setType(ActivityFeedTable::TYPE_PEER_INVITED);

					$response["notice"] = 'Peer invitation has been sent successfully.';
				} else {
					$peer->setStatus(PeerTable::STATUS_PEERED);
					$peer->save();
					$activityFeed->setType(ActivityFeedTable::TYPE_PEER_ACCEPTED);

					$response["notice"] = 'You\'ve accepted peer invitation successfully.';
				}

				$activityFeed->setItemId($peer->getId());
				$activityFeed->save();

				// link this activity with the invitee profile
				$profileActivityFeed = new ProfileActivityFeed();
				$profileActivityFeed->setProfileId($inviterId);
				$profileActivityFeed->setActivityFeedId($activityFeed->getId());
				$profileActivityFeed->save();

				// link this activity with the inviter profile
				$profileActivityFeed = new ProfileActivityFeed();
				$profileActivityFeed->setProfileId($inviteeId);
				$profileActivityFeed->setActivityFeedId($activityFeed->getId());
				$profileActivityFeed->save();

				$response["status"] = 'success';
			}
			else{
				$response["status"] = 'failure';
			}
		} catch (Exception $e) {
			$response["status"] = 'failure';
			$response["notice"] = 'Oops, an error has occurred and been sent to our support team.';
		}
		die(json_encode($response));
	}

	public function executeDecline(sfWebRequest $request) {
		$response = array();
		$response["status"] = '';
		$response["notice"] = '';

		try {
			$inviterId = $request->getParameter("inviter_id");
			if ($inviterId) {
				$inviteeId = $this->profile->getId();

				// make sure these peers are already linked
				$peer = PeerTable::getInstance()->findOneByPeers($inviterId, $inviteeId);
				if (!is_object($peer)) {
					$peer = new Peer();
					$peer->setInviteeId($inviteeId);
					$peer->setInviterId($inviterId);
					$peer->setStatus(PeerTable::STATUS_DECLINED);
					$peer->save();

					$response["notice"] = 'Peer invitation has been declined successfully.';
				} else {
					$peer->setStatus(PeerTable::STATUS_DECLINED);
					$peer->save();

					$response["notice"] = 'You\'ve accepted peer declined successfully.';
				}
				$response["status"] = 'success';
			}
			else{
				$response["status"] = 'failure';
			}
		} catch (Exception $e) {
			$response["status"] = 'failure';
			$response["notice"] = 'Oops, an error has occurred and been sent to our support team.';
		}
		die(json_encode($response));
	}

}
