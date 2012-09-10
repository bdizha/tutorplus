<?php

/**
 * instructor actions.
 *
 * @package    ecollegeplus
 * @subpackage instructor
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class instructorActions extends autoinstructorActions
{

    public function preExecute()
    {
        $this->instructorId = $this->getUser()->getMyAttribute('instructor_show_id', null);
        parent::preExecute();
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->getUser()->setMyAttribute('instructor_show_id',  $this->getRoute()->getObject()->getId());
        parent::executeEdit($request);
    }

    public function executeDetails(sfWebRequest $request)
    {
        $instructorId = $this->getUser()->getMyAttribute('instructor_show_id', null);
        if ($instructorId)
        {
            $this->redirect('@instructor_edit?id=' . $instructorId);
        }
        $this->redirect('@instrutor_new');
    }

    public function executeEditAcademicDetails(sfWebRequest $request)
    {
        $contact_instructor = Doctrine_Core::getTable('ContactInstructor')->findOneBy("instructorId", $this->instructorId);
        $this->getUser()->setMyAttribute('contact_instructor_show_id', is_object($contact_instructor) ? $contact_instructor->getId() : "");

        $this->forward404Unless($this->instructor = Doctrine_Core::getTable('Instructor')->find($this->instructorId));
        $this->form = new InstructorAcademicDetailsForm($this->instructor);
    }

    public function executeUpdateAcademicDetails(sfWebRequest $request)
    {
        $this->instructor = $this->getRoute()->getObject();
        $this->form = new InstructorAcademicDetailsForm($this->instructor);

        $this->processTabForm($request, $this->form);
    }
}
