<?php

require_once dirname(__FILE__) . '/../lib/newsGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/newsGeneratorHelper.class.php';

/**
 * news actions.
 *
 * @package    tutorplus
 * @subpackage news
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends autoNewsActions {

    public function executeDisplay(sfWebRequest $request) {
        $this->newsItems = NewsTable::getInstance()->retrieveOrdered();
    }

    public function executeRecent(sfWebRequest $request) {
        $this->newsItems = NewsTable::getInstance()->retrieveLatest(null, 3);
    }

    public function executeShow(sfWebRequest $request) {
        $this->forward404Unless($this->newsItem = $this->getRoute()->getObject());
    }

    public function sendEmail($object) {
        $toEmails = $object->getToEmails();
        $announcer = $object->getUser();
        $mailer = new tpMailer();
        $mailer->setTemplate('new-news-item');
        $mailer->setToEmails($toEmails);
        $mailer->addValues(array(
            "ANNOUNCER" => $announcer->getName(),
            "NEWS_ITEM_LINK" => $this->getPartial('email_template/link', array(
                'title' => $this->generateUrl('news_show', array("slug" => $object->getSlug()), 'absolute=true'),
                'route' => "@news_show?slug=" . $object->getSlug())
                )));

        $mailer->send();
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $news = $form->save();
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

            // send the news emails
            $this->sendEmail($news);

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $news)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@news_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);

                $this->redirect(array('sf_route' => 'news_edit', 'sf_subject' => $news));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
