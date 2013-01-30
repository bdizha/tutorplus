<?php

require_once dirname(__FILE__) . '/../lib/discussion/peerGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion/peerGeneratorHelper.class.php';

/**
 * discussion_peer actions.
 *
 * @package    tutorplus
 * @subpackage discussion_peer
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_peerActions extends autodiscussion_peerActions {

    public function preExecute() {
        parent::preExecute();
        $discussionGroupId = $this->getUser()->getMyAttribute('discussion_group_show_id', null);
        $this->redirectUnless($discussionGroupId, "@discussion_group");
        $this->discussionGroup = DiscussionGroupTable::getInstance()->find($discussionGroupId);

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
        parent::executeIndex($request);
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
        $this->currentMemberIds = array();

        // fetch all students for now
        $this->students = StudentTable::getInstance()->findAll();

        // fetch all instructors for now
        $this->instructors = InstructorTable::getInstance()->findAll();

        if ($request->getMethod() == "POST") {
            try {
                $members = $request->getParameter('members');

                // save members
                $this->currentMemberIds = $this->saveMemberInvitations($discussionGroupId, $members);

                // send invitation emails
                // $this->sendMemberInvitations($form, $members);
            } catch (Doctrine_Validator_Exception $e) {
                
            }
        } else {
            // fetch the current DiscussionGroup members
            $this->currentMemberIds = ProfileTable::getInstance()->retrieveProfileIdsByDiscussionGroupId($discussionGroupId);
        }
    }

    protected function saveMemberInvitations($discussionGroupId, $members = array()) {
        // initialise the members ids holder
        $postedMemberIds = array();
        foreach (array('student', 'instructor') as $memberType) {
            if ((isset($members[$memberType]) && is_array($members[$memberType]))) {
                foreach ($members[$memberType] as $memberProfileId) {
                    $postedMemberIds[] = $memberProfileId;
                }
            }
        }

        // fetch the current DiscussionGroup members
        $currentMembersIds = ProfileTable::getInstance()->retrieveProfileIdsByDiscussionGroupId($discussionGroupId);

        $toDelete = array_diff($currentMembersIds, $postedMemberIds);
        if (count($toDelete)) {
            DiscussionPeerTable::getInstance()->unSubscribeByProfileIdsAndDiscussionGroupId($toDelete, $discussionGroupId);
        }

        //myToolkit::debug($toDelete);

        $toAdd = array_diff($postedMemberIds, $currentMembersIds);
        if (count($toAdd)) {
            $users = ProfileTable::getInstance()->retrieveByIds($toAdd);
            foreach ($users as $user) {
                // make sure we don't add a member twice
                if (!in_array($user->getId(), $currentMembersIds)) {

                    $profileId = $user->getId();
                    if ($this->discussionGroup->hasJoined($profileId)) {
                        $discussionPeer = DiscussionPeerTable::getInstance()->findOneByDiscussionGroupIdAndProfileId($discussionGroupId, $profileId);
                        $discussionPeer->setIsRemoved(false);
                        $discussionPeer->save();
                    } else {
                        $discussionPeer = new DiscussionPeer();
                        $discussionPeer->setNickname(strtolower($user->getFirstName()));
                        $discussionPeer->setStatus(DiscussionPeerTable::MEMBERSHIP_TYPE_ORDINARY);
                        $discussionPeer->setDiscussionGroupId($discussionGroupId);
                        $discussionPeer->setProfileId($user->getId());
                        $discussionPeer->save();
                    }
                }
            }
        }

        return $postedMemberIds;
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
            $user = ProfileTable::getInstance()->find($profileId);

            if (!$this->discussionGroup->hasJoined($profileId)) {
                $discussionPeer = new DiscussionPeer();
                $discussionPeer->setNickname(strtolower($user->getFirstName()));
                $discussionPeer->setProfileId($profileId);
                $discussionPeer->setDiscussionGroupId($this->discussionGroup->getId());
                $discussionPeer->save();

                echo "{$user->getName()} has been added to this DiscussionGroup successfully.";
            } else {
                echo "It seems {$user->getName()} is already following this discusison!";
            }
        } catch (Exception $e) {
            echo "User could not be added to this DiscussionGroup.";
        }
    }

    protected function buildQuery() {
        $tableMethod = $this->configuration->getTableMethod();
        $query = Doctrine_Core::getTable('DiscussionPeer')
                ->createQuery('a')
                ->addWhere("a.discussion_group_id = ?", $this->getUser()->getMyAttribute('discussion_group_show_id', null))
                ->addOrderBy("a.updated_at Desc");

        if ($tableMethod) {
            $query = Doctrine_Core::getTable('DiscussionPeer')->$tableMethod($query);
        }

        $this->addSortQuery($query);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
        $query = $event->getReturnValue();

        return $query;
    }

}
