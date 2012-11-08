<?php

require_once dirname(__FILE__) . '/../lib/contact_instructorGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/contact_instructorGeneratorHelper.class.php';

/**
 * contact_instructor actions.
 *
 * @package    tutorplus
 * @subpackage contact_instructor
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contact_instructorActions extends autoContact_instructorActions
{

    public function preExecute()
    {        
        $instructor_id = $this->getUser()->getMyAttribute('instructor_show_id', null);
        $this->instructor = InstructorTable::getInstance()->find($instructor_id);
        
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

    public function executeDetails(sfWebRequest $request)
    {
        
    }

    public function executeEdit(sfWebRequest $request)
    {
        $contact_instructor_id = $this->getUser()->getMyAttribute('contact_instructor_show_id', null);

        if (is_null($contact_instructor_id) || empty($contact_instructor_id))
        {
            $this->contact_instructor = new ContactInstructor();
        }
        else
        {
            $this->contact_instructor = Doctrine_Core::getTable('ContactInstructor')->find($contact_instructor_id);
        }

        $this->form = $this->configuration->getForm($this->contact_instructor);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->contact_instructor = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->contact_instructor);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeNewContactDetails(sfWebRequest $request)
    {
        $this->form = $this->configuration->getForm();
        $this->contact_instructor = $this->form->getObject();
    }

    public function executeCreateContactDetails(sfWebRequest $request)
    {
        $this->contact_instructor = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->contact_instructor);

        $this->processForm($request, $this->form, "instructor_contact_details_edit");
        $this->setTemplate('newContactDetails');
    }

    public function executeEditContactDetails(sfWebRequest $request)
    {
        $this->contact_instructor = $this->getRoute()->getObject();

        $this->getUser()->setMyAttribute('contact_instructor_show_id', is_object($this->contact_instructor) ? $this->contact_instructor->getId() : "");

        $this->form = $this->configuration->getForm($this->contact_instructor);
    }

    public function executeUpdateContactDetails(sfWebRequest $request)
    {
        $this->contact_instructor = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->contact_instructor);

        $this->processForm($request, $this->form, "instructor_contact_details_edit");
        $this->setTemplate('editContactDetails');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
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
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
