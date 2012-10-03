<?php

class myUser extends sfGuardSecurityUser {

    private $namespace = "sfGuardSecurityUser";

    /**
     * Sets the attribute value
     *
     * @param string $attribute key
     * @param string $attribute value
     */
    public function setMyAttribute($key, $value) {
        $this->setAttribute($key, $value, $this->namespace);
    }

    /**
     * Returns the attribute value
     *
     * @param string $attribute key
     * @param string $attribute value
     */
    public function getMyAttribute($key, $default) {
        $attribute = $this->getAttribute($key, $default, $this->namespace);
        return $attribute;
    }

    public function getId() {
        return $this->getMyAttribute("user_id", null);
    }

    /**
     * Returns the student id 
     *
     * @return Doctrine_Record
     */
    public function getStudentId() {
        return $this->getMyAttribute("student_show_id", null);
    }

    /**
     * Returns the student record
     *
     * @return Doctrine_Record
     */
    public function getStudent($user_id = null) {
        return StudentTable::getInstance()->findOneBy("user_id", !is_null($user_id) ? $user_id : $this->getId());
    }

    /**
     * Returns the instructor id 
     *
     * @return Doctrine_Record
     */
    public function getInstructorId() {
        return $this->getMyAttribute("instructor_show_id", null);
    }

    /**
     * Returns the instructor record 
     *
     * @return Doctrine_Record
     */
    public function getInstructor($user_id = null) {
        return InstructorTable::getInstance()->findOneBy("user_id", !is_null($user_id) ? $user_id : $this->getId());
    }

    /**
     * Returns the staff id 
     *
     * @return Doctrine_Record
     */
    public function getStaffId() {
        return $this->getMyAttribute("staff_show_id", null);
    }

    /**
     * Returns the staff record 
     *
     * @return Doctrine_Record
     */
    public function getStaff($user_id = null) {
        return StaffTable::getInstance()->findOneBy("user_id", !is_null($user_id) ? $user_id : $this->getId());
    }

    public function signIn($user, $remember = false, $con = null) {
        parent::signIn($user, $remember, $con);

        $this->setAttribute('profile_show_id', $this->getId(), 'sfGuardSecurityUser');

        $student = StudentTable::getInstance()->findOneBy("user_id", $this->getId());
        if (is_object($student)) {
            $this->setAttribute('student_show_id', $student->getId(), 'sfGuardSecurityUser');
        }

        $instructor = InstructorTable::getInstance()->findOneBy("user_id", $this->getId());
        if (is_object($instructor)) {
            $this->setAttribute('instructor_show_id', $instructor->getId(), 'sfGuardSecurityUser');
        }

        $staff = StaffTable::getInstance()->findOneBy("user_id", $this->getId());
        if (is_object($staff)) {
            $this->setAttribute('staff_show_id', $staff->getId(), 'sfGuardSecurityUser');
        }
    }

    /**
     * Returns the current user Profile
     *
     * @return Doctrine_Record
     */
    public function getProfile() {
        $userId = $this->getMyAttribute("profile_show_id", null);
        $user = sfGuardUserTable::getInstance()->findOneById($userId);

        try {
            return $user->getProfile();
        } catch (sfException $e) {
            return null;
        }
    }

    /**
     * Returns the current correspondent
     *
     * @return Doctrine_Record
     */
    public function getCorrespondent($user_id = null) {
        if ($this->getStudent()) {
            return $this->getStudent();
        } else if ($this->getInstructor()) {
            return $this->getInstructor();
        }
        echo "Oops, I'm a staff guy!, how could it possibly be possible?";
        die;
    }

    /**
     * Returns the current user type
     *
     * @return Doctrine_Record
     */
    public function getType() {
        if ($this->getStudentId())
            return sfGuardUserTable::TYPE_STUDENT;
        if ($this->getInstructorId())
            return sfGuardUserTable::TYPE_INSTRUCTOR;
        if ($this->getStaffId())
            return sfGuardUserTable::TYPE_STAFF;
        return null;
    }

    public function hasPhoto() {
        return count(sfFinder::type('file')->in(sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getId())) > 0;
    }

    public function isCurrent($userId) {
        return $userId == $this->getId();
    }

}
