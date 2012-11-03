<?php

/**
 * Instructor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tutorplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Instructor extends BaseInstructor
{

    public function __toString()
    {
        return $this->getUser()->__toString();
    }

    public function getName()
    {
        return $this->getUser()->get('name');
    }

    public function getFirstName()
    {
        return $this->getUser()->get('first_name');
    }

    public function getLastName()
    {
        return $this->getUser()->get('last_name');
    }

    public function getFullname()
    {
        return $this->getUser()->get('first_name') . " " . $this->getUser()->get('last_name');
    }

    public function getEmailAddress()
    {
        return $this->getUser()->get('email_address');
    }

    public function getIsActive()
    {
        return $this->getUser()->get('is_active');
    }

    public function getDateOfBirth()
    {
        return date('d-m-Y', strtotime(parent::_get('date_of_birth')));
    }

    public function getCourses()
    {
        $courses = array();
        $instructorCourses = $this->getInstrustorCourses();
        foreach ($instructorCourses as $instructorCourse)
        {
            $courses[$instructorCourse->getCourse()->getId()] = $instructorCourse->getCourse();
        }

        return $courses;
    }

    public function getMailingLists()
    {
        $mailingLists = array();
        $instructorMailingLists = parent::getInstructorMailingLists();
        foreach ($instructorMailingLists as $instructorMailingList)
        {
            $mailingLists[$instructorMailingList->getMailingList()->getId()] = $instructorMailingList->getMailingList();
        }

        return $mailingLists;
    }
    
    public function saveDefaultContact()
    {
        $instructorContact = $this->getInstructorContact();
        if(!is_object($instructorContact)){
            $instructorContact = new InstructorContact();
            $instructorContact->setCountryId(1);
            $instructorContact->setStateProvinceId(1);
            $instructorContact->setInstructorId($this->getId());
            $instructorContact->setPostalCountryId(1);
            $instructorContact->setPostalStateProvinceId(1);
            $instructorContact->save();
        }
    }
}