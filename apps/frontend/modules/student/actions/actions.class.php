<?php

require_once dirname(__FILE__) . '/../lib/studentGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/studentGeneratorHelper.class.php';

/**
 * student actions.
 *
 * @package    tutorplus
 * @subpackage student
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class studentActions extends autoStudentActions {

    public function preExecute() {
        $this->studentId = $this->getUser()->getMyAttribute('student_show_id', null);
        parent::preExecute();
    }

    public function executeEdit(sfWebRequest $request) {
        $this->getUser()->setMyAttribute('student_show_id', $this->getRoute()->getObject()->getId());
        $this->student = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->student);
        $this->student->saveDefaultContact();
    }

    public function executeDetails(sfWebRequest $request) {
        $studentId = $this->getUser()->getMyAttribute('student_show_id', null);
        if ($studentId) {
            $this->redirect('@student_edit?id=' . $studentId);
        }
        $this->redirect('@student_new');
    }

    public function executeInlineEdit(sfWebRequest $request) {
        $this->student = $this->getRoute()->getObject();
        $this->form = new StudentInlineForm($this->student);
    }

    public function executeInlineUpdate(sfWebRequest $request) {
        $this->student = $this->getRoute()->getObject();
        $this->form = new StudentInlineForm($this->student);
        $this->processInlineForm($request, $this->form, "@student_inline_edit?id=" . $this->student->getId());
    }

    protected function processInlineForm(sfWebRequest $request, sfForm $form, $route) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
            try {
                $student = $form->save();
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

            $this->getUser()->setFlash('notice', $notice);
            $this->redirect($route);
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
