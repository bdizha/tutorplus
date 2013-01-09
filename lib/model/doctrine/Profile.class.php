<?php

/**
 * Profile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tutorplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Profile extends BaseProfile {

  protected $_groups = null, $_allPermissions = null;

  /**
   * Returns the string representation of the object: "Full Name"
   *
   * @return string
   */
  public function __toString() {
    return (string) $this->getName();
  }

  /**
   * Returns the first and last name of the user concatenated together
   *
   * @return string $name
   */
  public function getName() {
    return trim($this->getFirstName() . ' ' . $this->getLastName());
  }

  /**
   * Sets the user password.
   *
   * @param string $password
   */
  public function setPassword($password) {
    if (!$password && 0 == strlen($password)) {
      return;
    }

    if (!$salt = $this->getSalt()) {
      $salt = md5(rand(100000, 999999) . $this->getName());
      $this->setSalt($salt);
    }
    $modified = $this->getModified();
    if ((!$algorithm = $this->getAlgorithm()) || (isset($modified['algorithm']) && $modified['algorithm'] == $this->getTable()->getDefaultValueOf('algorithm'))) {
      $algorithm = 'sha1';
    }
    $algorithmAsStr = is_array($algorithm) ? $algorithm[0] . '::' . $algorithm[1] : $algorithm;
    if (!is_callable($algorithm)) {
      throw new sfException(sprintf('The algorithm callable "%s" is not callable.', $algorithmAsStr));
    }
    $this->setAlgorithm($algorithmAsStr);

    $this->_set('password', call_user_func_array($algorithm, array($salt . $password)));
  }

  /**
   * Returns whether or not the given password is valid.
   *
   * @param string $password
   * @return boolean
   */
  public function checkPassword($password) {
    $algorithm = $this->getAlgorithm();
    if (false !== $pos = strpos($algorithm, '::')) {
      $algorithm = array(substr($algorithm, 0, $pos), substr($algorithm, $pos + 2));
    }
    if (!is_callable($algorithm)) {
      throw new sfException(sprintf('The algorithm callable "%s" is not callable.', $algorithm));
    }

    return $this->getPassword() == call_user_func_array($algorithm, array($this->getSalt() . $password));
  }

  /**
   * Adds the user a new group from its name.
   *
   * @param string $name The group name
   * @param Doctrine_Connection $con A Doctrine_Connection object
   * @throws sfException
   */
  public function addGroupByName($name, $con = null) {
    $group = Doctrine_Core::getTable('ProfileGroup')->findOneByName($name);
    if (!$group) {
      throw new sfException(sprintf('The group "%s" does not exist.', $name));
    }

    $profileGroup = new ProfileProfileGroup();
    $profileGroup->setProfile($this);
    $profileGroup->setGroup($group);

    $profileGroup->save($con);

    // add group and permissions to local vars
    $this->_groups[$group->getName()] = $group;
    foreach ($group->getPermissions() as $permission) {
      $this->_allPermissions[$permission->getName()] = $permission;
    }
  }

  /**
   * Adds the user a permission from its name.
   *
   * @param string $name The permission name
   * @param Doctrine_Connection $con A Doctrine_Connection object
   * @throws sfException
   */
  public function addPermissionByName($name, $con = null) {
    $permission = Doctrine_Core::getTable('ProfileProfilePermission')->findOneByName($name);
    if (!$permission) {
      throw new sfException(sprintf('The permission "%s" does not exist.', $name));
    }

    $up = new ProfileProfilePermission();
    $up->setProfile($this);
    $up->setPermission($permission);

    $up->save($con);

    // add permission to local vars
    $this->_allPermissions[$permission->getName()] = $permission;
  }

  /**
   * Checks whether or not the user belongs to the given group.
   *
   * @param string $name The group name
   * @return boolean
   */
  public function hasGroup($name) {
    $this->loadGroupsAndPermissions();
    return isset($this->_groups[$name]);
  }

  /**
   * Returns all related groups names.
   *
   * @return array
   */
  public function getGroupNames() {
    $this->loadGroupsAndPermissions();
    return array_keys($this->_groups);
  }

  /**
   * Returns whether or not the user has the given permission.
   *
   * @return boolean
   */
  public function hasPermission($name) {
    $this->loadGroupsAndPermissions();
    return isset($this->_allPermissions[$name]);
  }

  /**
   * Returns an array of all user's permissions names.
   *
   * @deprecated use getAllPermissionNames instate
   * @return array
   */
  public function getPermissionNames() {
    return $this->getAllPermissionNames();
  }

  /**
   * Returns an array containing all permissions, including groups permissions
   * and single permissions.
   *
   * @return array
   */
  public function getAllPermissions() {
    if (!$this->_allPermissions) {
      $this->_allPermissions = array();
      $permissions = $this->getPermissions();
      foreach ($permissions as $permission) {
        $this->_allPermissions[$permission->getName()] = $permission;
      }

      foreach ($this->getGroups() as $group) {
        foreach ($group->getPermissions() as $permission) {
          $this->_allPermissions[$permission->getName()] = $permission;
        }
      }
    }

    return $this->_allPermissions;
  }

  /**
   * Returns an array of all permission names.
   *
   * @return array
   */
  public function getAllPermissionNames() {
    return array_keys($this->getAllPermissions());
  }

  /**
   * Loads the user's groups and permissions.
   *
   */
  public function loadGroupsAndPermissions() {
    $this->getAllPermissions();

    if (!$this->_groups) {
      $this->_groups = array();
      $groups = $this->getGroups();
      foreach ($groups as $group) {
        $this->_groups[$group->getName()] = $group;
      }
    }
  }

  /**
   * Reloads the user's groups and permissions.
   */
  public function reloadGroupsAndPermissions() {
    $this->_groups = null;
    $this->_allPermissions = null;
  }

  /**
   * Sets the password hash.
   *
   * @param string $v
   */
  public function setPasswordHash($v) {
    if (!is_null($v) && !is_string($v)) {
      $v = (string) $v;
    }

    if ($this->password !== $v) {
      $this->_set('password', $v);
    }
  }

    public function getCourses() {
        $courses = array();
        $profileCourses = parent::getProfileCourses();
        foreach ($profileCourses as $profileCourse) {
            $courses[$profileCourse->getCourse()->getId()] = $profileCourse->getCourse();
        }

        return $courses;
    }

    public function getProgrammes() {
        $programmes = array();
        $profileProgrammes = parent::getProfileProgrammes();
        foreach ($profileProgrammes as $profileProgram) {
            $programmes[$profileProgram->getProgramme()->getId()] = $profileProgram->getProgramme();
        }

        return $programmes;
    }

    public function getMailingLists() {
        $mailingLists = array();
        $profileMailingLists = parent::getProfileMailingLists();
        foreach ($profileMailingLists as $profileMailingList) {
            $mailingLists[$profileMailingList->getMailingList()->getId()] = $profileMailingList->getMailingList();
        }

        return $mailingLists;
    }

    public function isEnrolled($courseId) {
        return is_object(ProfileCourseTable::getInstance()->findOneByProfileIdAndCourseId($this->getId(), $courseId));
    }

}
