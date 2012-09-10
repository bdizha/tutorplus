<?php

/**
 * student_contact actions.
 *
 * @package    ecollegeplus
 * @subpackage student_contact
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class student_contactActions extends autostudent_contactActions
{

    public function preExecute()
    {
        $this->profile_type = "";
        if ($this->getUser()->getStudentId())
        {
            $this->profile = $this->getUser()->getStudent();
            $this->profile_type = "student";
        }
        else if ($this->getUser()->getInstructorId())
        {
            $this->profile = $this->getUser()->getInstructor();
            $this->profile_type = "instructor";
        }
        else if ($this->getUser()->getStaffId())
        {
            $this->profile = $this->getUser()->getStaff();
            $this->profile_type = "staff";

            echo "Oops, I'm a staff!, how could it possibly be possible?";
            die;
        }

        $this->forward404Unless($this->profile);
        parent::preExecute();
    }

    public function executeIndex(sfWebRequest $request)
    {
    }

    public function executeDetails(sfWebRequest $request)
    {
        $this->forward404Unless($this->profile);
    }

    public function executeNewContactDetails(sfWebRequest $request)
    {
        parent::executeNew($request);
        $student_id = $this->getUser()->getMyAttribute('student_show_id', null);
        $this->student = StudentTable::getInstance()->find($student_id);
    }

    public function executeCreateContactDetails(sfWebRequest $request)
    {
        $this->student_contact = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->student_contact);

        $this->processForm($request, $this->form, "student_contact_details_edit");
        $this->setTemplate('newContactDetails');
    }

    public function executeEditContactDetails(sfWebRequest $request)
    {
        parent::executeEdit($request);
        $student_id = $this->getUser()->getMyAttribute('student_show_id', null);
        $this->student = StudentTable::getInstance()->find($student_id);
        $this->getUser()->setMyAttribute('student_contact_show_id', is_object($this->student_contact) ? $this->student_contact->getId() : "");
    }

    public function executeUpdateContactDetails(sfWebRequest $request)
    {
        $this->student_contact = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->student_contact);

        $this->processForm($request, $this->form, "student_contact_details_edit");
        $this->setTemplate('editContactDetails');
    }

    public function executeEditInline(sfWebRequest $request)
    {
        parent::executeEdit($request);
        $this->fieldset = $request['fieldset'];
    }

    public function executeUpdateInline(sfWebRequest $request)
    {
        $this->fieldset = $request['fieldset'];
        $this->student_contact = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->student_contact);

        $this->processForm($request, $this->form);
        $this->setTemplate('editInline');
    }

    protected function processForm(sfWebRequest $request, sfForm $form, $sf_route = "contact_instructor_edit")
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try
            {
                $contact_instructor = $form->save();
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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $contact_instructor)));

            if ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');
                die("You're trying to add a new contact instructor please modify this code");
            }
            else
            {
                $this->getUser()->setFlash('notice', $notice);
                
                $this->redirect("@student_contact_edit?fieldset=".$this->fieldset);
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
