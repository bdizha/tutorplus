<?php

require_once dirname(__FILE__) . '/../lib/discussion_postGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_postGeneratorHelper.class.php';

/**
 * discussion_post actions.
 *
 * @package    tutorplus
 * @subpackage discussion_post
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_postActions extends autoDiscussion_postActions {

    public function executeShow(sfWebRequest $request) {
        $this->getUser()->setMyAttribute('profile_show_id', $this->getUser()->getId());
        $discussionPostId = $this->getUser()->getMyAttribute('discussion_post_show_id', null);
        $this->discussionPost = DiscussionPostTable::getInstance()->find($discussionPostId);

        if ($this->discussionPost) {
            $this->discussionCommentForm = new DiscussionCommentForm();
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $isNew = $form->getObject()->isNew();
            $notice = $form->getObject()->isNew() ? 'Your message was created successfully.' : 'Your message was updated successfully.';

            try {
                $discussion_post = $form->save();
            } catch (Doctrine_Validator_Exception $e) {
                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }

            // send the discussion_post emails
            if ($isNew) {
                //$this->sendEmail($discussion_post);
            }

            // session the new created DiscussionGroup topic message id
            $this->getUser()->setMyAttribute('discussion_post_show_id', $discussion_post->getId());

            $this->getUser()->setFlash('notice', $notice);
            die("success");
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function sendEmail($object) {
        $discussionTopic = $object->getDiscussionTopic();
        $toEmails = $discussionTopic->getToEmails();
        $owner = $object->getProfile();
        $mailer = new tpMailer();
        $mailer->setTemplate('new-discussion-topic-message');
        $mailer->setToEmails($toEmails);
        $mailer->addValues(array(
            "OWNER" => $owner->getName(),
            "discussion_post" => $object->getMessage(),
            "discussion_topic_LINK" => $this->getPartial('email_template/link', array(
                'title' => $this->generateUrl('discussion_topic_show', array("slug" => $discussionTopic->getSlug()), 'absolute=true'),
                'route' => "@discussion_topic_show?slug=" . $discussionTopic->getSlug())
                )));

        $mailer->send();
    }

}
