<?php

require_once dirname(__FILE__) . '/../lib/announcementGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/announcementGeneratorHelper.class.php';

/**
 * announcement actions.
 *
 * @package    tutorplus
 * @subpackage announcement
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class announcementActions extends autoAnnouncementActions {

    public function executeDisplay(sfWebRequest $request) {
        $this->announcements = AnnouncementTable::getInstance()->retrieveOrdered();
    }

    public function executeRecent(sfWebRequest $request) {
        $this->announcements = AnnouncementTable::getInstance()->retrieveLatest(null, 3);
    }

    public function executeShow(sfWebRequest $request) {
        $this->forward404Unless($this->announcement = $this->getRoute()->getObject());
    }

    public function sendAnnouncementEmails($object) {
        $toEmails = $object->getToEmails();
        $announcer = $object->getUser();
        $mailer = new tpMailer();
        $mailer->setTemplate('new-announcement');
        $mailer->setToEmails($toEmails);
        $mailer->addValues(array(
            "ANNOUNCER" => $announcer->getName(),
            "ANNOUNCEMENT_LINK" => $this->getPartial('email_template/link', array(
                'title' => $this->generateUrl('announcement_show', array("slug" => $object->getSlug()), 'absolute=true'),
                'route' => "@announcement_show?slug=" . $object->getSlug())
                )));

        $mailer->send();
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $announcement = $form->save();
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

            // send the announcement emails
            $this->sendAnnouncementEmails($announcement);

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $announcement)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@announcement_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);

                $this->redirect(array('sf_route' => 'announcement_edit', 'sf_subject' => $announcement));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
