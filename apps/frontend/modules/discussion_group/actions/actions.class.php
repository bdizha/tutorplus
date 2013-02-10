<?php

require_once dirname(__FILE__) . '/../lib/discussion_groupGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_groupGeneratorHelper.class.php';

/**
 * discussion_group actions.
 *
 * @package    tutorplus.org
 * @subpackage discussion_group
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_groupActions extends autoDiscussion_groupActions {
	
	public function preExecute()
	{
		parent::preExecute();
    	$this->exploreDiscussions = DiscussionGroupTable::getInstance()->findAll();
    	$this->myDiscussions = DiscussionGroupTable::getInstance()->findByProfileId($this->getUser()->getId());
	}

    public function executeIndex(sfWebRequest $request) {
        $this->forward('discussion_group', 'explorer');
    }

    public function executeShow(sfWebRequest $request) {
        $this->discussionGroup = $this->getRoute()->getObject();
        $this->forward404Unless($this->discussionGroup);
        $this->getUser()->setMyAttribute('discussion_group_show_id', $this->discussionGroup->getId());

        $this->discussionGroup->setViewCount($this->discussionGroup->getViewCount() + 1);
        $this->discussionGroup->save();
        $course = $this->discussionGroup->getCourseDiscussionGroup()->getCourse();
        if ($course->getId()) {
            $this->course = $course;
            $this->getUser()->setMyAttribute('course_show_id', $course->getId());
        }

        $this->discussionPeer = DiscussionPeerTable::getInstance()->getPeersByDiscussionGroupIdAndProfileId($this->discussionGroup->getId(), $this->getUser()->getId());
    }

    public function executeExplorer(sfWebRequest $request) {
    }

    public function executeMy(sfWebRequest $request) {
    }

    public function executePeers(sfWebRequest $request) {
        $discussionGroupId = $this->getUser()->getMyAttribute('discussion_group_show_id', null);
        $this->discussionGroup = DiscussionGroupTable::getInstance()->find($discussionGroupId);
    }

    public function sendEmail($object) {
//         $toEmails = $object->getToEmails();
//         $owner = $object->getProfile();
//         $mailer = new tpMailer();
//         $mailer->setTemplate('new-discussion-group');
//         $mailer->setToEmails($toEmails);
//         $mailer->addValues(array(
//             "OWNER" => $owner->getName(),
//             "DESCRIPTION" => $object->getDescription(),
//             "discussion_group_LINK" => $this->getPartial('email_template/link', array(
//                 'title' => $this->generateUrl('discussion_group_show', array("slug" => $object->getSlug()), 'absolute=true'),
//                 'route' => "@discussion_group_show?slug=" . $object->getSlug())
//             )));

//         $mailer->send();
    }
}
