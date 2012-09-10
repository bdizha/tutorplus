<?php

require_once dirname(__FILE__) . '/../lib/message_inboxGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/message_inboxGeneratorHelper.class.php';

/**
 * message_inbox actions.
 *
 * @package    ecollegeplus
 * @subpackage message_inbox
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_inboxActions extends autoMessage_inboxActions
{

    public function preExecute()
    {
        $this->total_inbox_count = EmailMessageTable::getInstance()->countInboxByEmail($this->getUser()->getEmail());
        $this->total_drafts_count = EmailMessageTable::getInstance()->countDraftsByEmail($this->getUser()->getEmail());
        $this->total_sent_count = EmailMessageTable::getInstance()->countSentByEmail($this->getUser()->getEmail());
        $this->total_trash_count = EmailMessageTable::getInstance()->countTrashByEmail($this->getUser()->getEmail());

        parent::preExecute();
    }

    public function executeAutoEmailTo(sfWebRequest $request)
    {
        $previousEmailAddresses = array();
        if (preg_match_all('/<([^<>]+)>/', $request['q'], $matches))
        {
            if (isset($matches[1]))
            {
                $previousEmailAddresses[] = $matches[1];
            }
        }

        $toEmails = array_map("trim", explode(",", $request['q']));

        foreach ($toEmails as $toEmail)
        {
            if (preg_match_all('/(([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,}))/', $toEmail, $matches))
            {
                if (isset($matches[1]))
                {
                    $previousEmailAddresses[] = $matches[1];
                }
            }
        }

        $result = sfGuardUserTable::getInstance()->findBySearch($toEmails[count($toEmails) - 1], $previousEmailAddresses, 100)
            ->toKeyValueArray('email_address', 'name');

        return $this->renderText(json_encode($this->emailfyName($result)));
    }

    public function emailfyName($data)
    {
        foreach ($data as $email_address => $name)
        {
            $data[$email_address] = $name . " <" . $email_address . ">";
        }
        return $data;
    }

    public function executeInboxTab(sfWebRequest $request)
    {
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
        {
            $this->setSort(array($request->getParameter('sort', "created_at"), $request->getParameter('sort_type', "asc")));
        }

        // pager
        if ($request->getParameter('page'))
        {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();

        // determine if there are any results returned for this current pager
        if ($this->pager->getResults()->count() == 0)
        {
            $this->setPage(1);
            $this->pager = $this->getPager();
        }
    }

    public function executeNewTab(sfWebRequest $request)
    {
        $this->form = $this->configuration->getForm();
        $this->email_message = $this->form->getObject();
    }

    public function executeChooseRecipients(sfWebRequest $request)
    {
        $this->type = $request->getParameter('type');

        // fetch all students for now
        $this->students = StudentTable::getInstance()->findAll();

        // fetch all instructors for now
        $this->instructors = InstructorTable::getInstance()->findAll();

        // fetch all mailing lists for now
        $this->mailingLists = MailingListTable::getInstance()->findAll();

        if ($request->getMethod() == "POST")
        {
            $recipient = $request->getParameter('recipient');
            $this->recipient = $this->getUser()->getMyAttribute('email_message_recipients', array());

            $this->recipient[$this->type] = $recipient[$this->type];
            $this->getUser()->setMyAttribute('email_message_recipients', $this->recipient);
        }
        else
        {
            $this->recipient = $this->getUser()->getMyAttribute('email_message_recipients', array());
        }
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->form = $this->configuration->getForm();
        $this->email_message = $this->form->getObject();

        $this->processForm($request, $this->form);
        $this->setTemplate('newTab');
    }

    public function executeReply(sfWebRequest $request)
    {
        $this->form = $this->configuration->getForm(null, array('hideExtraFields' => true));
        $this->processForm($request, $this->form);
        die("success");
    }

    public function executeReadTab(sfWebRequest $request)
    {
        $this->email_message = $this->getRoute()->getObject();

        if (!$this->email_message->getIsRead())
        {
            $this->email_message->setIsRead(true);
            $this->email_message->save();
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $status = $form->getValue("status");
            $notice = ($status == 0) ? 'Your message has been successfully sent.' : 'Your message draft has been saved.';

            try
            {
                // this becomes the sent message
                $sentEmailMessage = $form->save();

                // do the actual email sending
                if ($form->getValue("to_email"))
                {
                    $this->sendToEmails($form, $sentEmailMessage);
                }
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

            $this->getUser()->setMyAttribute('email_message_recipients', null);

            $this->getUser()->setFlash('notice', $notice);
            die("success");
        }
        else
        {
//            foreach ($form as $field)
//            {
//                echo $field->renderLabel() . " " . $field->renderError() . "<br />";
//            }
//            //die($form->renderGlobalErrors());
//            die(">>>");

            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    protected function sendToEmails($form = array(), $sentEmailMessage = "")
    {
        $recipientEmails = array();
        $toEmails = explode(";", $form->getValue("to_email"));
        $ccEmails = explode(";", $form->getValue("cc_email"));
        $bccEmails = explode(";", $form->getValue("bcc_email"));

        $recipientEmails = array_unique(array_merge($toEmails, $ccEmails));
        $recipientEmails = array_unique(array_merge($recipientEmails, $bccEmails));

        $emailMessageRecipients = $this->getUser()->getMyAttribute('email_message_recipients', array());

        $mailingListIds = array();
        foreach (array('to_email', 'cc_email', 'bcc_email') as $type)
        {
            if ((isset($emailMessageRecipients[$type]['mailing_list']) && is_array($emailMessageRecipients[$type]['mailing_list'])))
            {
                $mailingListIds = array_unique(array_merge($mailingListIds, $emailMessageRecipients['to_email']['mailing_list']));
            }
        }

        // fetch all the mailing users
        foreach (MailingListTable::getInstance()->retrieveByIds($mailingListIds) as $mailingList)
        {
            foreach ($mailingList->getInstructorMailingLists() as $instructorMailingList)
            {
                $recipientEmails[] = $instructorMailingList->getInstructor()->getUser()->getEmail();
            }

            foreach ($mailingList->getStudentMailingLists() as $studentMailingList)
            {
                $recipientEmails[] = $studentMailingList->getStudent()->getUser()->getEmail();
            }
        }

        foreach ($recipientEmails as $recipientEmail)
        {
            if (!empty($recipientEmail) && $recipientEmail != 'notnull')
            {
                // send emails to each recipient
                $receivedMessage = new EmailMessage();
                $receivedMessage->setSenderId($sentEmailMessage->getSenderId());
                $receivedMessage->setFromEmail($sentEmailMessage->getFromEmail());
                $receivedMessage->setSubject($sentEmailMessage->getSubject());
                $receivedMessage->setBody($sentEmailMessage->getBody());
                $receivedMessage->setEmailTemplateId($sentEmailMessage->getEmailTemplateId());
                $receivedMessage->setReplyTo($sentEmailMessage->getReplyTo());
                $receivedMessage->setStatus(1);
                $receivedMessage->setToEmail($recipientEmail);
                $receivedMessage->setCcEmail($sentEmailMessage->getCcEmail());
                $receivedMessage->setBccEmail($sentEmailMessage->getBccEmail());
                $receivedMessage->save();

                $emailMessageCorrespondence = new EmailMessageCorrespondence();
                $emailMessageCorrespondence->setInitiatorId($sentEmailMessage->getId());
                $emailMessageCorrespondence->setCorrespondentId($receivedMessage->getId());
                $emailMessageCorrespondence->save();
            }
        }

        if ($form->getValue("is_reply"))
        {
            // record this reply
            $emailMessageReply = new EmailMessageReply();
            $emailMessageReply->setSenderId($form->getValue("previous_sender_id"));
            $emailMessageReply->setResponderId($form->getValue("sender_id"));
            $emailMessageReply->setEmailMessageId($form->getValue("previous_id"));
            $emailMessageReply->setEmailMessageReplyId($sentEmailMessage->getId());
            $emailMessageReply->save();
        }
    }

    protected function buildQuery()
    {
        $tableMethod = $this->configuration->getTableMethod();
        $query = Doctrine_Core::getTable('EmailMessage')
            ->createQuery('a')
            ->addWhere("to_email like ?", "%{$this->getUser()->getEmail()}%")
            ->andWhere("is_trashed = ?", 0)
            ->andWhere("status = ?", 1);

        if ($tableMethod)
        {
            $query = Doctrine_Core::getTable('EmailMessage')->$tableMethod($query);
        }

        $this->addSortQuery($query);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
        $query = $event->getReturnValue();

        return $query;
    }

    public function executeBatch(sfWebRequest $request)
    {
        if (!$ids = $request->getParameter('ids'))
        {
            die(sprintf('You must at least select one item.'));
        }

        if (!$action = $request->getParameter('batch_action'))
        {
            die(sprintf('You must select an action to execute on the selected items.'));
        }

        if (!method_exists($this, $method = 'execute' . ucfirst($action)))
        {
            die(sprintf('You must create a "%s" method for action "%s"', $method, $action));
        }

        $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'EmailMessage'));
        try
        {
            // validate ids
            $ids = $validator->clean($ids);

            // execute batch
            $this->$method($request);
        }
        catch (sfValidatorError $e)
        {
            die(sprintf('A problem occurs when deleting the selected items as some items do not exist anymore.'));
        }

        die("success");
    }

    protected function executeBatchTrash(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');
        EmailMessageTable::getInstance()->updateByPks($ids, array("is_trashed" => 1));
        $this->getUser()->setFlash('notice', 'The selected items have been trashed successfully.');
    }

    protected function executeBatchMarkAsRead(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');
        EmailMessageTable::getInstance()->updateByPks($ids, array("is_read" => 1));
        $this->getUser()->setFlash('notice', 'The selected items have been marked read successfully.');
    }

    protected function executeBatchMarkAsUnread(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');
        EmailMessageTable::getInstance()->updateByPks($ids, array("is_read" => 0));
        $this->getUser()->setFlash('notice', 'The selected items have been marked unread successfully.');
    }

}