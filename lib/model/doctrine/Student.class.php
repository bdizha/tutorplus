<?php

/**
 * Student
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ecollegeplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Student extends BaseStudent {

    public function __toString() {
        return $this->getUser()->__toString();
    }

    public function getName() {
        return $this->getUser()->get('name');
    }

    public function getEmail() {
        return $this->getUser()->get('email_address');
    }

    public function getFirstName() {
        return $this->getUser()->get('first_name');
    }

    public function getLastName() {
        return $this->getUser()->get('last_name');
    }

    public function getFullname() {
        return $this->getUser()->get('first_name') . " " . $this->getUser()->get('last_name');
    }

    public function getEmailAddress() {
        return $this->getUser()->get('email_address');
    }

    public function getIsActive() {
        return $this->getUser()->get('is_active');
    }

    public function getDateOfBirth() {
        return date('d-m-Y', strtotime(parent::_get('date_of_birth')));
    }

    public function getStudentGradebookItem($gradebook_item_id = null) {
        return StudentGradebookItemTable::getInstance()->retrieveByStudentAndGradebookItem($this->get('id'), $gradebook_item_id);
    }

    public function getStudentAttendance($attendance_id = null) {
        return StudentAttendanceTable::getInstance()->retrieveByStudentAndAttendance($this->get('id'), $attendance_id);
    }

    public function getCourses() {
        $courses = array();
        $studentCourses = parent::getStudentCourses();
        foreach ($studentCourses as $studentCourse) {
            $courses[$studentCourse->getCourse()->getId()] = $studentCourse->getCourse();
        }

        return $courses;
    }

    public function getProgrammes() {
        $programmes = array();
        $studentProgrammes = parent::getStudentProgrammes();
        foreach ($studentProgrammes as $studentProgram) {
            $programmes[$studentProgram->getProgram()->getId()] = $studentProgram->getProgram();
        }

        return $programmes;
    }

    public function getMailingLists() {
        $mailingLists = array();
        $studentMailingLists = parent::getStudentMailingLists();
        foreach ($studentMailingLists as $studentMailingList) {
            $mailingLists[$studentMailingList->getMailingList()->getId()] = $studentMailingList->getMailingList();
        }

        return $mailingLists;
    }

    public function saveDefaultContact() {
        
        $studentContact = $this->getStudentContact();
        if (!$studentContact->getId()) {
            $studentContact = new StudentContact();
            $studentContact->setStudentId($this->getId());
            $studentContact->setCountryId(1);
            $studentContact->setStateProvinceId(1);
            $studentContact->setPostalStateProvinceId(1);
            $studentContact->setPostalCountryId(1);
            $studentContact->setGuardianStateProvinceId(1);
            $studentContact->setGuardianCountryId(1);
            $studentContact->setGuardianStateProvinceId(1);
            $studentContact->save();
        }
    }

}