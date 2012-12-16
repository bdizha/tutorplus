<?php

require_once dirname(__FILE__) . '/../lib/discussion_memberGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_memberGeneratorHelper.class.php';

/**
 * discussion_member actions.
 *
 * @package    tutorplus
 * @subpackage discussion_member
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_memberActions extends autoDiscussion_memberActions {

    public function preExecute() {
        parent::preExecute();
        $discussionId = $this->getUser()->getMyAttribute('discussion_show_id', null);
        $this->redirectUnless($discussionId, "@discussion");
        $this->discussion = DiscussionTable::getInstance()->find($discussionId);

        $this->helper->setDiscussion($this->discussion);
        $this->forward404Unless($this->discussion);
    }

    public function beforeExecute() {
        $course = $this->discussion->getCourseDiscussion()->getCourse();
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

    public function executeFollowers(sfWebRequest $request) {
        $this->beforeExecute();
    }

    public function executeEdit(sfWebRequest $request) {
        $this->discussion_member = $this->getRoute()->getObject();
        $this->getUser()->setMyAttribute('discussion_member_show_id', $this->discussion_member->getId());
        $this->form = $this->configuration->getForm($this->discussion_member);
    }

    public function executeInvite(sfWebRequest $request) {
        $discussionId = $this->getUser()->getMyAttribute('discussion_show_id', null);
        $this->currentMemberIds = array();

        // fetch all students for now
        $this->students = StudentTable::getInstance()->findAll();

        // fetch all instructors for now
        $this->instructors = InstructorTable::getInstance()->findAll();

        if ($request->getMethod() == "POST") {
            try {
                $members = $request->getParameter('members');

                // save members
                $this->currentMemberIds = $this->saveMemberInvitations($discussionId, $members);

                // send invitation emails
                // $this->sendMemberInvitations($form, $members);
            } catch (Doctrine_Validator_Exception $e) {
                
            }
        } else {
            // fetch the current discussion members
            $this->currentMemberIds = sfGuardUserTable::getInstance()->retrieveUserIdsByDiscussionId($discussionId);
        }
    }

    protected function saveMemberInvitations($discussionId, $members = array()) {
        // initialise the members ids holder
        $postedMemberIds = array();
        foreach (array('student', 'instructor') as $memberType) {
            if ((isset($members[$memberType]) && is_array($members[$memberType]))) {
                foreach ($members[$memberType] as $memberUserId) {
                    $postedMemberIds[] = $memberUserId;
                }
            }
        }

        // fetch the current discussion members
        $currentMembersIds = sfGuardUserTable::getInstance()->retrieveUserIdsByDiscussionId($discussionId);

        $toDelete = array_diff($currentMembersIds, $postedMemberIds);
        if (count($toDelete)) {
            DiscussionMemberTable::getInstance()->unSubscribeByUserIdsAndDiscussionId($toDelete, $discussionId);
        }

        //myToolkit::debug($toDelete);

        $toAdd = array_diff($postedMemberIds, $currentMembersIds);
        if (count($toAdd)) {
            $users = sfGuardUserTable::getInstance()->retrieveByIds($toAdd);
            foreach ($users as $user) {
                // make sure we don't add a member twice
                if (!in_array($user->getId(), $currentMembersIds)) {

                    $userId = $user->getId();
                    if ($this->discussion->hasJoined($userId)) {
                        $discussionMember = DiscussionMemberTable::getInstance()->findOneByDiscussionIdAndUserId($discussionId, $userId);
                        $discussionMember->setIsRemoved(false);
                        $discussionMember->save();
                    } else {
                        $discussionMember = new DiscussionMember();
                        $discussionMember->setNickname(strtolower($user->getFirstName()));
                        $discussionMember->setStatus(DiscussionMemberTable::MEMBERSHIP_TYPE_ORDINARY);
                        $discussionMember->setDiscussionId($discussionId);
                        $discussionMember->setUserId($user->getId());
                        $discussionMember->save();
                    }
                }
            }
        }

        return $postedMemberIds;
    }

    public function executeSuggested(sfWebRequest $request) {

        if ($this->discussion) {
            if ($this->getUser()->getType() == sfGuardUserTable::TYPE_STUDENT) {
                $studentId = $this->getUser()->getStudentId();
                $userId = $this->getUser()->getId();

                $this->suggestedFollowers = DiscussionMemberTable::getInstance()->retrieveSuggestionsByStudentIdAndUserId($studentId, $userId, $this->discussion->getId());
            } elseif ($this->getUser()->getType() == sfGuardUserTable::TYPE_INSTRUCTOR) {
                $this->suggestedFollowers = null;
            }
        } else {
            die("redirect");
        }
    }

    public function executeAccept(sfWebRequest $request) {
        try {
            $userId = $request->getParameter("user_id");
            $user = sfGuardUserTable::getInstance()->find($userId);

            if (!$this->discussion->hasJoined($userId)) {
                $discussionMember = new DiscussionMember();
                $discussionMember->setNickname(strtolower($user->getFirstName()));
                $discussionMember->setUserId($userId);
                $discussionMember->setDiscussionId($this->discussion->getId());
                $discussionMember->save();

                echo "{$user->getName()} has been added to this discussion successfully.";
            } else {
                echo "It seems {$user->getName()} is already following this discusison!";
            }
        } catch (Exception $e) {
            echo "User could not be added to this discussion.";
        }
    }

    protected function buildQuery() {
        $tableMethod = $this->configuration->getTableMethod();
        $query = Doctrine_Core::getTable('DiscussionMember')
                ->createQuery('a')
                ->addWhere("a.discussion_id = ?", $this->getUser()->getMyAttribute('discussion_show_id', null))
                ->addOrderBy("a.updated_at Desc");

        if ($tableMethod) {
            $query = Doctrine_Core::getTable('DiscussionMember')->$tableMethod($query);
        }

        $this->addSortQuery($query);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
        $query = $event->getReturnValue();

        return $query;
    }

}
