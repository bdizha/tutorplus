<?php

require_once dirname(__FILE__) . '/../lib/student_contactGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/student_contactGeneratorHelper.class.php';

/**
 * student_contact actions.
 *
 * @package    tutorplus
 * @subpackage student_contact
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class student_contactActions extends autoStudent_contactActions
{

    public function preExecute()
    {
        $studentId = $this->getUser()->getMyAttribute('student_show_id', null);
        $this->student = StudentTable::getInstance()->find($studentId);
        parent::preExecute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->redirectUnless($this->student, "@student");
        $studentContact = StudentContactTable::getInstance()->findOneByStudentId($this->student->getId());
        if ($studentContact)
        {
            $this->redirect('@student_contact_edit?id=' . $studentContact->getId());
        }
        
        parent::executeNew($request);
    }
    
    public function executeEdit(sfWebRequest $request)
    {
        $this->redirectUnless($this->student, "@student");
        parent::executeEdit($request);
    }

    public function executeDetails(sfWebRequest $request)
    {
        $this->forward404Unless($this->profile);
    }

    public function executeInlineEdit(sfWebRequest $request)
    {
        $this->fieldset = $request['fieldset'];
        $studentId = $this->getUser()->getMyAttribute('student_show_id', null);
        $this->student_contact = StudentContactTable::getInstance()->findOneByStudentId($studentId);
        $this->form = new StudentContactForm($this->student_contact);
    }

    public function executeInlineUpdate(sfWebRequest $request)
    {
        $this->fieldset = $request['fieldset'];
        $studentId = $this->getUser()->getMyAttribute('student_show_id', null);
        $this->student_contact = StudentContactTable::getInstance()->findOneByStudentId($studentId);
        $this->form = new StudentContactForm($this->student_contact);
        $this->processInlineForm($request, $this->form, "@student_contact_inline_edit?fieldset=" . $this->fieldset);
        $this->setTemplate('inlineEdit');
    }

    protected function processInlineForm(sfWebRequest $request, sfForm $form, $route = null)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
            try
            {
                $student_contact = $form->save();
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
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $student_contact)));

            $this->getUser()->setFlash('notice', $notice);
            $this->redirect($route ? $route : "@student_contact_edit?id=" . $this->student_contact->getId());
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
