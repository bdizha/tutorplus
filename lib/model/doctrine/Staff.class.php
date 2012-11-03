<?php

/**
 * Staff
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tutorplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Staff extends BaseStaff
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
        $staffCourses = $this->getInstrustorCourses();
        foreach ($staffCourses as $staffCourse)
        {
            $courses[$staffCourse->getCourse()->getId()] = $staffCourse->getCourse();
        }

        return $courses;
    }

    public function getMailingLists()
    {
        $mailingLists = array();
        $staffMailingLists = parent::getStaffMailingLists();
        foreach ($staffMailingLists as $staffMailingList)
        {
            $mailingLists[$staffMailingList->getMailingList()->getId()] = $staffMailingList->getMailingList();
        }

        return $mailingLists;
    }

}
