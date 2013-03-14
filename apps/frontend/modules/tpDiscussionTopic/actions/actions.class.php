<?php

require_once dirname(__FILE__) . '/../lib/tpDiscussionTopicGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpDiscussionTopicGeneratorHelper.class.php';
/**
 * tpDiscussionTopic actions.
 *
 * @package    tutorplus
 * @subpackage discussion_topic
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpDiscussionTopicActions extends autoTpDiscussionTopicActions
{

    public function preExecute()
    {
        parent::preExecute();
        $discussionId = $this->getUser()->getMyAttribute('discussion_show_id', null);
        $this->discussion = DiscussionTable::getInstance()->find($discussionId);
        $this->redirectUnless($this->discussion, "@discussion_explorer");
        
        $this->helper->setDiscussion($this->discussion);        
        $this->course = $this->discussion->getCourseDiscussion()->getCourse();
        if ($this->course->getId()) {
            $this->helper->setCourse($this->course);
        }
        $this->myPeers = PeerTable::getInstance()->findByProfileId($this->getUser()->getId());
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->forward404Unless($this->discussionTopic = $this->getRoute()->getObject());
        $this->getUser()->setMyAttribute('discussion_topic_show_id', $this->discussionTopic->getId());
        $this->discussionTopic->setViewCount($this->discussionTopic->getViewCount() + 1);
        $this->discussionTopic->save();
        
        $this->helper->setDiscussionTopic($this->discussionTopic);  

        $this->discussionPeer = DiscussionPeerTable::getInstance()->getPeersByDiscussionIdAndProfileId($this->discussion->getId(), $this->getUser()->getId());

        $this->course = $this->discussionTopic->getDiscussion()->getCourseDiscussion()->getCourse();
        if (is_object($this->course) && $this->course->getId()) {
            $this->getUser()->setMyAttribute('course_show_id', $this->course->getId());
        }
        $this->discussionCommentForm = new DiscussionCommentForm();
        $this->discussionPostForm = new DiscussionPostForm();
        $this->discussionPostForm->setDefaults(array(
            "profile_id" => $this->getUser()->getId(),
            "discussion_topic_id" => $this->discussionTopic->getId()
        ));
    }

    public function executeDelete(sfWebRequest $request)
    {
        $discussionTopic = $this->getRoute()->getObject();
        $request->checkCSRFProtection();
        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $discussionTopic)));
        if ($this->getRoute()->getObject()->delete()) {
            $this->getUser()->setFlash('notice', 'The topic was deleted successfully.');
        }

        $this->redirect('@discussion_show?slug=' . $discussionTopic->getDiscussion()->getSlug());
    }

    public function sendEmail($object)
    {
//         $toEmails = $object->getToEmails();
//         $announcer = $object->getProfile();
//         $mailer = new tpMailer();
//         $mailer->setTemplate('new-discussion-topic');
//         $mailer->setToEmails($toEmails);
//         $mailer->addValues(array(
//             "OWNER" => $announcer->getName(),
//             "discussion_topic" => $object->getMessage(),
//             "discussion_topic_LINK" => $this->getPartial('email_template/link', array(
//                     'title' => $this->generateUrl('discussion_topic_show', array("slug" => $object->getSlug()), 'absolute=true'),
//                     'route' => "@discussion_topic_show?slug=" . $object->getSlug())
//             )));
//         $mailer->send();
    }

}
