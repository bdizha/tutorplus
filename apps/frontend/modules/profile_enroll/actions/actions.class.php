<?php

require_once dirname(__FILE__) . '/../lib/profile_enrollGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profile_enrollGeneratorHelper.class.php';

/**
 * profile_enroll actions.
 *
 * @package    tutorplus.org
 * @subpackage profile_enroll
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_enrollActions extends autoProfile_enrollActions {

    public function preExecute() {
        $this->redirectIf($this->getUser()->isAuthenticated(), "@dashboard");
        parent::preExecute();
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $isNew = $form->getObject()->isNew();
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $profile = $form->save();
                $values = $this->form->getValues();

                if ($values["is_instructor"]) {
                    // set instructor permissions
                    $profile->link("Permissions", array(ProfilePermissionTable::getInstance()->findInstructorPermissionId()));
                } else {
                    // set student permissions
                    $profile->link("Permissions", array(ProfilePermissionTable::getInstance()->findStudentPermissionId()));
                }
                $profile->save();

                $this->getUser()->signin($profile, false);

                $logInUrl = $this->getUser()->getReferer($request->getReferer());

                $this->getUser()->setFlash('notice', 'Greetings from the TutorPlus team, and we wish you a wonderful time with us.');
                $this->getUser()->setFlash('error', false, false);

                return $this->redirect('' != $logInUrl ? $logInUrl : '@dashboard');
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

            // send the profile emails
            if ($isNew) {
                $this->sendEmail($profile);
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $profile)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@profile_enroll_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);

                $this->redirect(array('sf_route' => 'profile_enroll_edit', 'sf_subject' => $profile));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function sendEmail($profile) {
//    $mailer = new tpMailer();
//    $mailer->setTemplate('student-enrollment');
//    $mailer->setToEmails($profile->getName() . " <" . $profile->getEmail() . ">");
//    $mailer->addValues(
//        array(
//            "USER" => $profile->getName()
//        )
//    );
//
//    $mailer->send();
    }

}
