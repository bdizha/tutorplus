<?php

require_once dirname(__FILE__) . '/../lib/tpDiscussionGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpDiscussionGeneratorHelper.class.php';
/**
 * tpDiscussion actions.
 *
 * @package    tutorplus.org
 * @subpackage tpDiscussion
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpDiscussionActions extends autoTpDiscussionActions
{

    public function preExecute()
    {
        parent::preExecute();
        $this->exploreDiscussions = DiscussionTable::getInstance()->findAll();
        $this->myDiscussions = DiscussionTable::getInstance()->findByProfileId($this->getUser()->getId());
    }

    public function executeIndex(sfWebRequest $request)
    {
        $this->forward('discussion', 'explorer');
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->discussion = $this->getRoute()->getObject();
        $this->forward404Unless($this->discussion);
        $this->getUser()->setMyAttribute('discussion_show_id', $this->discussion->getId());

        $this->discussion->setViewCount($this->discussion->getViewCount() + 1);
        $this->discussion->save();
        $this->course = $this->discussion->getCourseDiscussion()->getCourse();
        if ($this->course->getId()) {
            $this->helper->setCourse($this->course);
            $this->getUser()->setMyAttribute('course_show_id', $this->course->getId());
        }

        $this->discussionPeer = DiscussionPeerTable::getInstance()->getPeersByDiscussionIdAndProfileId($this->discussion->getId(), $this->getUser()->getId());
    }

    public function executeTopics(sfWebRequest $request)
    {
        $discussionId = $this->getUser()->getMyAttribute('discussion_show_id', null);
        $this->discussion = DiscussionTable::getInstance()->find($discussionId);
        $this->redirectUnless($this->discussion, "@discussion_explorer");
        $this->course = $this->discussion->getCourseDiscussion()->getCourse();
        if ($this->course->getId()) {
            $this->helper->setCourse($this->course);
            $this->getUser()->setMyAttribute('course_show_id', $this->course->getId());
        }

        $this->discussionPeer = DiscussionPeerTable::getInstance()->getPeersByDiscussionIdAndProfileId($this->discussion->getId(), $this->getUser()->getId());
    }

    public function executeExplorer(sfWebRequest $request)
    {
        
    }

    public function executeMy(sfWebRequest $request)
    {
        
    }

    public function executePeers(sfWebRequest $request)
    {
        $discussionId = $this->getUser()->getMyAttribute('discussion_show_id', null);
        $this->discussion = DiscussionTable::getInstance()->find($discussionId);
    }

    public function sendEmail($object)
    {
//         $toEmails = $object->getToEmails();
//         $owner = $object->getProfile();
//         $mailer = new tpMailer();
//         $mailer->setTemplate('new-discussion-group');
//         $mailer->setToEmails($toEmails);
//         $mailer->addValues(array(
//             "OWNER" => $owner->getName(),
//             "DESCRIPTION" => $object->getDescription(),
//             "discussion_LINK" => $this->getPartial('email_template/link', array(
//                 'title' => $this->generateUrl('discussion_show', array("slug" => $object->getSlug()), 'absolute=true'),
//                 'route' => "@discussion_show?slug=" . $object->getSlug())
//             )));
//         $mailer->send();
    }

}
