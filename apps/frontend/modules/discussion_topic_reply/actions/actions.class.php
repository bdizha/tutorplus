<?php

require_once dirname(__FILE__) . '/../lib/discussion_topic_replyGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_topic_replyGeneratorHelper.class.php';

/**
 * discussion_topic_reply actions.
 *
 * @package    tutorplus
 * @subpackage discussion_topic_reply
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topic_replyActions extends autoDiscussion_topic_replyActions {

    public function executeShow(sfWebRequest $request) {
        $this->discussionTopicMessageReply = $this->getRoute()->getObject();
        if (!$this->discussionTopicMessageReply) {
            die();
        }
    }

    public function executeCreate(sfWebRequest $request) {
        $this->form = $this->configuration->getForm();
        $this->discussion_topic_reply = $this->form->getObject();

        $this->processForm($request, $this->form);
        $this->setTemplate('new');
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = $this->configuration->getForm();

        if ($request->getMethod() == "POST") {
            $this->processForm($request, $this->form);
        } else {
            $discussionTopicMessageId = $this->getUser()->getMyAttribute('discussion_topic_message_show_id', null);
            $this->discussionTopicMessage = DiscussionTopicMessageTable::getInstance()->find($discussionTopicMessageId);
        }
    }

    public function sendEmail($object) {
        $toEmails = $object->getToEmails();
        $owner = $object->getUser();
        $mailer = new tpMailer();
        $mailer->setTemplate('new-discussion-topic-reply');
        $mailer->setToEmails($toEmails);
        $mailer->addValues(array(
            "OWNER" => $owner->getName(),
            "DISCUSSION_TOPIC_REPLY" => $object->getMessage(),
            "DISCUSSION_TOPIC_LINK" => $this->getPartial('email_template/link', array(
                'title' => $this->generateUrl('discussion_topic_show', array("slug" => $object->getDiscussionTopicMessage()->getDiscussionTopic()->getSlug()), 'absolute=true'),
                'route' => "@discussion_topic_show?slug=" . $object->getDiscussionTopicMessage()->getDiscussionTopic()->getSlug())
                )));

        $mailer->send();
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            try {
                $isNew = $form->getObject()->isNew();

                $this->discussion_topic_reply = $form->save();
                $this->getUser()->setMyAttribute('discussion_topic_message_show_id', $this->discussion_topic_reply->getDiscussionTopicMessageId());


                // send the discussion_topic_message emails
                if ($isNew) {
                    $this->sendEmail($discussion_topic_message);
                }

                echo $this->discussion_topic_reply->getId();
                exit;
            } catch (Doctrine_Validator_Exception $e) {
                
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $this->discussion_topic_reply)));
        } else {
            die("failure");
        }
    }

}
