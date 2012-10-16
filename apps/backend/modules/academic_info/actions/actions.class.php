<?php

/**
 * academic_info actions.
 *
 * @package    ecollegeplus
 * @subpackage academic_info
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class academic_infoActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeEdit(sfWebRequest $request) {
        $profile = $this->getUser()->getProfile();
        $user = $this->getUser()->getProfile()->getUser();

        // construct the academic info form based on the user type
        $academicInfoForm = $user->getType() . "AcademicInfoForm";
        $this->form = new $academicInfoForm($profile);
    }

    public function executeUpdate(sfWebRequest $request) {
        $profile = $this->getUser()->getProfile();
        $user = $this->getUser()->getProfile()->getUser();

        // construct the academic info form based on the user type
        $academicInfoForm = $user->getType() . "AcademicInfoForm";

        $this->form = new $academicInfoForm($profile);
        $this->processEditForm($request, $this->form, "@academic_info_edit?id=" . $user->getId());
        $this->setTemplate('edit');
    }

    protected function processEditForm(sfWebRequest $request, sfForm $form, $route) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = 'Your personal info has been updated successfully.';
            try {
                $profile = $form->save();
            } catch (Doctrine_Validator_Exception $e) {
                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $profile)));

            $this->getUser()->setFlash('notice', $notice);
            $this->redirect($route);
        } else {
            $this->getUser()->setFlash('error', 'Your personal info has not been saved due to some errors.', false);
        }
    }

}

