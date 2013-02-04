<?php

require_once dirname(__FILE__) . '/../lib/discussion_topicGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_topicGeneratorHelper.class.php';

/**
 * discussion_topic actions.
 *
 * @package    tutorplus
 * @subpackage discussion_topic
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topicActions extends autoDiscussion_topicActions {

    public function executeShow(sfWebRequest $request) {
        $this->forward404Unless($this->discussionTopic = $this->getRoute()->getObject());
        $this->getUser()->setMyAttribute('discussion_topic_show_id', $this->discussionTopic->getId());
        $this->getUser()->setMyAttribute('discussion_group_show_id', $this->discussionTopic->getDiscussionGroupId());

        $this->discussionTopic->setViewCount($this->discussionTopic->getViewCount() + 1);
        $this->discussionTopic->save();
        
        $this->discussionGroup = $this->discussionTopic->getDiscussionGroup();        
        $this->discussionPeer = DiscussionPeerTable::getInstance()->getPeersByDiscussionGroupIdAndProfileId($this->discussionGroup->getId(), $this->getUser()->getId());

        $this->course = $this->discussionTopic->getDiscussionGroup()->getCourseDiscussionGroup()->getCourse();
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

    public function executeNew(sfWebRequest $request) {
        $this->forward404Unless($this->discussionGroup = Doctrine_Core::getTable('DiscussionGroup')->find(array(
            $this->getUser()->getMyAttribute('discussion_group_show_id', null))), sprintf('Object does not exist (%s).', $this->getUser()->getMyAttribute('discussion_group_show_id', null)));
        $this->form = $this->configuration->getForm();
        $this->discussion_topic = $this->form->getObject();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($this->discussionGroup = DiscussionGroupTable::getInstance()->find(
            array(
                $this->getUser()->getMyAttribute('discussion_group_show_id', null)
            )), sprintf('Object does not exist (%s).', $this->getUser()->getMyAttribute('discussion_group_show_id', null)
            ));
        $this->form = $this->configuration->getForm();
        $this->discussion_topic = $this->form->getObject();

        $this->processForm($request, $this->form);
        $this->setTemplate('new');
    }

    public function executeDelete(sfWebRequest $request) {
        $discussionTopic = $this->getRoute()->getObject();
        $request->checkCSRFProtection();
        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $discussionTopic)));
        if ($this->getRoute()->getObject()->delete()) {
            $this->getUser()->setFlash('notice', 'The topic was deleted successfully.');
        }

        $this->redirect('@discussion_group_show?slug=' . $discussionTopic->getDiscussionGroup()->getSlug());
    }
    
    public function sendlEmail($object) {
        $toEmails = $object->getToEmails();
        $announcer = $object->getProfile();
        $mailer = new tpMailer();
        $mailer->setTemplate('new-discussion-topic');
        $mailer->setToEmails($toEmails);
        $mailer->addValues(array(
            "OWNER" => $announcer->getName(),
            "discussion_topic" => $object->getMessage(),
            "discussion_topic_LINK" => $this->getPartial('email_template/link', array(
                'title' => $this->generateUrl('discussion_topic_show', array("slug" => $object->getSlug()), 'absolute=true'),
                'route' => "@discussion_topic_show?slug=" . $object->getSlug())
            )));

        $mailer->send();
    }

}
