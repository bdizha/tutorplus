<?php

require_once dirname(__FILE__) . '/../lib/student_enrollGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/student_enrollGeneratorHelper.class.php';

/**
 * student_enroll actions.
 *
 * @package    tutorplus.org
 * @subpackage student_enroll
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class student_enrollActions extends autoStudent_enrollActions {

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $isNew = $form->getObject()->isNew();
            $notice = 'Congrats! You have been successfully enrolled as a TutorPlus student.';

            try {
                $student = $form->save();

                // save default student contact details
                $student->saveDefaultContact($form->getValues());

                // save student course
                $student->saveDefaultCourses($form->getValues());

                // send the student emails
                if ($isNew) {
                    $this->sendEmail($student);
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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $student)));

            // automatically sign in the student
            $this->getUser()->signin($student->getUser(), false);

            $this->getUser()->setFlash('notice', $notice);

            // redirect them to their dashboard
            $this->redirect('@dashboard');
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function sendEmail($object) {
        $user = $object->getUser();
        $mailer = new tpMailer();
        $mailer->setTemplate('student-enrollment');
        $mailer->setToEmails($user->getName() . " <" . $user->getEmail() . ">");
        $mailer->addValues(
                array(
                    "USER" => $user->getName()
                )
        );

        $mailer->send();
    }

}
