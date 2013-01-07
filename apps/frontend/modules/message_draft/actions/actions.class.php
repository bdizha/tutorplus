<?php

require_once dirname(__FILE__) . '/../lib/message_draftGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/message_draftGeneratorHelper.class.php';

/**
 * message_draft actions.
 *
 * @package    tutorplus
 * @subpackage message_draft
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_draftActions extends autoMessage_draftActions {

    public function preExecute() {
        $this->totalInboxCount = EmailMessageTable::getInstance()->countInboxByEmail($this->getUser()->getEmail());
        $this->totalDraftsCount = EmailMessageTable::getInstance()->countDraftsByEmail($this->getUser()->getEmail());
        $this->totalSentCount = EmailMessageTable::getInstance()->countSentByEmail($this->getUser()->getEmail());
        $this->totalTrashCount = EmailMessageTable::getInstance()->countTrashByEmail($this->getUser()->getEmail());

        parent::preExecute();
    }

    public function executeDraftTab(sfWebRequest $request) {
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
        }

        // pager
        if ($request->getParameter('page')) {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();

        // determine if there are any results returned for this current pager
        if ($this->pager->getResults()->count() == 0) {
            $this->setPage(1);
            $this->pager = $this->getPager();
        }
    }

    public function executeEditTab(sfWebRequest $request) {
        $this->email_message = $this->getRoute()->getObject();
        $this->form = new EmailMessageForm($this->email_message);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->email_message = $this->getRoute()->getObject();
        $this->form = new EmailMessageForm($this->email_message);

        $this->processForm($request, $this->form);

        $this->setTemplate('editTab');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $status = $form->getValue("status");
            $notice = ($status == EmailMessageTable::EMAIL_MESSAGE_STATUS_SENT) ? 'Your message has been sent successfully.' : 'Your message draft has been saved successfully.';

            try {
                // this becomes the sent message
                $sentEmailMessage = $form->save();

                // do the actual email sending if and if there message is being sent
                if ($form->getValue("to_email") && $status == EmailMessageTable::EMAIL_MESSAGE_STATUS_SENT) {
                    $this->sendToEmails($form, $sentEmailMessage);
                }
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

            $this->getUser()->setMyAttribute('email_message_recipients', null);

            $this->getUser()->setFlash('notice', $notice);
            die("success");
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    protected function sendToEmails($form = array(), $sentEmailMessage = "") {
        $recipientEmails = array();
        $toEmails = explode(";", $form->getValue("to_email"));
        $ccEmails = explode(";", $form->getValue("cc_email"));
        $bccEmails = explode(";", $form->getValue("bcc_email"));

        $recipientEmails = array_unique(array_merge($toEmails, $ccEmails));
        $recipientEmails = array_unique(array_merge($recipientEmails, $bccEmails));

        $emailMessageRecipients = $this->getUser()->getMyAttribute('email_message_recipients', array());

        $mailingListIds = array();
        foreach (array('to_email', 'cc_email', 'bcc_email') as $type) {
            if ((isset($emailMessageRecipients[$type]['mailing_list']) && is_array($emailMessageRecipients[$type]['mailing_list']))) {
                $mailingListIds = array_unique(array_merge($mailingListIds, $emailMessageRecipients['to_email']['mailing_list']));
            }
        }

        // fetch all the mailing users
        foreach (MailingListTable::getInstance()->retrieveByIds($mailingListIds) as $mailingList) {
            foreach ($mailingList->getInstructorMailingLists() as $instructorMailingList) {
                $recipientEmails[] = $instructorMailingList->getInstructor()->getProfile()->getEmail();
            }

            foreach ($mailingList->getStudentMailingLists() as $studentMailingList) {
                $recipientEmails[] = $studentMailingList->getStudent()->getProfile()->getEmail();
            }
        }

        foreach ($recipientEmails as $recipientEmail) {
            if (!empty($recipientEmail) && $recipientEmail != 'notnull') {
                // send emails to each recipient
                $receivedMessage = new EmailMessage();
                $receivedMessage->setSenderId($sentEmailMessage->getSenderId());
                $receivedMessage->setFromEmail($sentEmailMessage->getFromEmail());
                $receivedMessage->setSubject($sentEmailMessage->getSubject());
                $receivedMessage->setBody($sentEmailMessage->getBody());
                $receivedMessage->setEmailTemplateId($sentEmailMessage->getEmailTemplateId());
                $receivedMessage->setReplyTo($sentEmailMessage->getReplyTo());
                $receivedMessage->setStatus(EmailMessageTable::EMAIL_MESSAGE_STATUS_RECEIVED);
                $receivedMessage->setToEmail($recipientEmail);
                $receivedMessage->setCcEmail($sentEmailMessage->getCcEmail());
                $receivedMessage->setBccEmail($sentEmailMessage->getBccEmail());
                $receivedMessage->save();

                if ($form->getValue("is_reply")) {

                    // fetch a correspondent message
                    $emailMessageCorrespondence = EmailMessageCorrespondenceTable::getInstance()->findOneByInitiatorId($form->getValue("previous_id"));
                    if (is_object($emailMessageCorrespondence)) {
                        $emailMessageId = $emailMessageCorrespondence->getInviteeId();
                    } else {
                        $emailMessageCorrespondence = EmailMessageCorrespondenceTable::getInstance()->findOneByInviteeId($form->getValue("previous_id"));
                        $emailMessageId = $emailMessageCorrespondence->getInitiatorId();
                    }

                    // record this reply
                    $emailMessageReply = new EmailMessageReply();
                    $emailMessageReply->setSenderId($form->getValue("previous_sender_id"));
                    $emailMessageReply->setResponderId($form->getValue("sender_id"));
                    $emailMessageReply->setEmailMessageId($emailMessageId);
                    $emailMessageReply->setEmailMessageReplyId($receivedMessage->getId());
                    $emailMessageReply->save();
                } else {
                    $emailMessageCorrespondence = new EmailMessageCorrespondence();
                    $emailMessageCorrespondence->setInitiatorId($sentEmailMessage->getId());
                    $emailMessageCorrespondence->setInviteeId($receivedMessage->getId());
                    $emailMessageCorrespondence->save();
                }
            }
        }

        if ($form->getValue("is_reply")) {
            // record this reply
            $emailMessageReply = new EmailMessageReply();
            $emailMessageReply->setSenderId($form->getValue("previous_sender_id"));
            $emailMessageReply->setResponderId($form->getValue("sender_id"));
            $emailMessageReply->setEmailMessageId($form->getValue("previous_id"));
            $emailMessageReply->setEmailMessageReplyId($sentEmailMessage->getId());
            $emailMessageReply->save();
        }
    }

    protected function buildQuery() {
        $tableMethod = $this->configuration->getTableMethod();
        $query = Doctrine_Core::getTable('EmailMessage')
                ->createQuery('a')
                ->addWhere("from_email like ?", "%{$this->getUser()->getEmail()}%")
                ->andWhere("status = ?", 2);

        if ($tableMethod) {
            $query = Doctrine_Core::getTable('EmailMessage')->$tableMethod($query);
        }

        $this->addSortQuery($query);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
        $query = $event->getReturnValue();

        return $query;
    }

    public function executeBatch(sfWebRequest $request) {
        if (!$ids = $request->getParameter('ids')) {
            die(sprintf('You must at least select one item.'));
        }

        if (!$action = $request->getParameter('batch_action')) {
            die(sprintf('You must select an action to execute on the selected items.'));
        }

        if (!method_exists($this, $method = 'execute' . ucfirst($action))) {
            die(sprintf('You must create a "%s" method for action "%s"', $method, $action));
        }

        $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'EmailMessage'));
        try {
            // validate ids
            $ids = $validator->clean($ids);

            // execute batch
            $this->$method($request);
        } catch (sfValidatorError $e) {
            die(sprintf('A problem occurs when deleting the selected items as some items do not exist anymore.'));
        }

        die("success");
    }

    protected function executeBatchDelete(sfWebRequest $request) {
        $ids = $request->getParameter('ids');

        $records = Doctrine_Query::create()
                ->from('EmailMessage')
                ->whereIn('id', $ids)
                ->execute();

        foreach ($records as $record) {
            $record->delete();
        }

        $this->getUser()->setFlash('notice', 'The selected items have been permanently deleted.');
    }

}