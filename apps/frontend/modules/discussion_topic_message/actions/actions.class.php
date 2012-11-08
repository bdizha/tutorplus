<?php

require_once dirname(__FILE__) . '/../lib/discussion_topic_messageGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_topic_messageGeneratorHelper.class.php';

/**
 * discussion_topic_message actions.
 *
 * @package    tutorplus
 * @subpackage discussion_topic_message
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topic_messageActions extends autoDiscussion_topic_messageActions
{

    public function executeShow(sfWebRequest $request)
    {
        $discussionTopicMessageId = $this->getUser()->getMyAttribute('discussion_topic_message_show_id', null);        
        $this->discussionTopicMessage = DiscussionTopicMessageTable::getInstance()->find($this->getUser()->getMyAttribute('discussion_topic_message_show_id', null));
        
        if(!$this->discussionTopicMessage){
            die();
        }
        else{
            $this->replyForm = new DiscussionTopicReplyForm();
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'Your message was created successfully.' : 'Your message was updated successfully.';

            try
            {
                $discussion_topic_message = $form->save();
            }
            catch (Doctrine_Validator_Exception $e)
            {
                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors)
                {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }
            
            // session the new created discussion topic message id
            $this->getUser()->setMyAttribute('discussion_topic_message_show_id', $discussion_topic_message->getId());

            $this->getUser()->setFlash('notice', $notice);
            die("success");
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
