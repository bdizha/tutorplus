<?php

require_once dirname(__FILE__) . '/../lib/discussion_commentGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_commentGeneratorHelper.class.php';

/**
 * discussion_comment actions.
 *
 * @package    tutorplus
 * @subpackage discussion_comment
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_commentActions extends autoDiscussion_commentActions {

    public function executeShow(sfWebRequest $request) {
        $this->discussionComment = $this->getRoute()->getObject();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->form = $this->configuration->getForm();
        $this->discussion_comment = $this->form->getObject();

        $this->processForm($request, $this->form);
        $this->setTemplate('new');
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = $this->configuration->getForm();

        if ($request->getMethod() == "POST") {
            $this->processForm($request, $this->form);
        } else {
            $discussionPostId = $this->getUser()->getMyAttribute('discussion_post_show_id', null);
            $this->discussionPost = DiscussionPostTable::getInstance()->find($discussionPostId);
        }
    }

    public function sendEmail($object) {
        $discussionTopic = $object->getDiscussionPost()->getDiscussionTopic();
        $toEmails = $discussionTopic->getToEmails();
        $owner = $object->getProfile();
        $mailer = new tpMailer();
        $mailer->setTemplate('new-discussion-comment');
        $mailer->setToEmails($toEmails);
        $mailer->addValues(array(
            "OWNER" => $owner->getName(),
            "discussion_comment" => $object->getMessage(),
            "discussion_topic_LINK" => $this->getPartial('email_template/link', array(
                'title' => $this->generateUrl('discussion_topic_show', array("slug" => $discussionTopic->getSlug()), 'absolute=true'),
                'route' => "@discussion_topic_show?slug=" . $discussionTopic->getSlug())
                )));

        $mailer->send();
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            try {
                $isNew = $form->getObject()->isNew();

                $this->discussion_comment = $form->save();
                $this->getUser()->setMyAttribute('discussion_post_show_id', $this->discussion_comment->getDiscussionPostId());

                // send the discussion_post emails
                if ($isNew) {
                    //$this->sendEmail($discussion_post);
                }

                echo $this->discussion_comment->getId();
                exit;
            } catch (Doctrine_Validator_Exception $e) {
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $this->discussion_comment)));
        } else {
            die("failure");
        }
    }

}
