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
      $notice = 'Congrats! You have been successfully enrolled as our new student.';

      try {
        $profile = $form->save();
        
        // set student permissions
        $profile->link("Permissions", array(ProfilePermissionTable::getInstance()->findStudentPermissionId()));
        $profile->save();

        // send the student emails
        if ($isNew) {
          //$this->sendEmail($student);
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
      $this->getUser()->signin($profile, true);

      $this->getUser()->setFlash('notice', $notice);

      // redirect them to their dashboard
      $this->redirect('@dashboard');
    } else {

      foreach ($form as $name => $field):
        if ($field->hasError()):
          echo '<li>' . $name . '</li>';
        endif;
      endforeach;
      die;

      $this->getUser()->setFlash('error', 'Your personal info has not been saved due to some errors.', false);
    }
  }

  public function sendEmail($object) {
    $user = $object->getProfile();
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
