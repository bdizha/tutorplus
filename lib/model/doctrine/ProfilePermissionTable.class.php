<?php

/**
 * ProfilePermissionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProfilePermissionTable extends Doctrine_Table {

  static public $choices = array();

  const PERMISSION_STUDENT = "Student";
  const PERMISSION_INSTRUCTOR = "Instructor";

  /**
   * Returns an instance of this class.
   *
   * @return object ProfilePermissionTable
   */
  public static function getInstance() {
    return Doctrine_Core::getTable('ProfilePermission');
  }

  public function getChoices() {
    $q = $this->createQuery('pp');
    $choices = $q->execute();

    foreach ($choices as $choice) {
      self::$choices[$choice->getId()] = $choice->getName();
    }

    return self::$choices;
  }

  public function findStudentPermissionId() {
    $q = $this->createQuery('pp')
        ->where('pp.name = ?', self::PERMISSION_STUDENT);
    $profilePermission = $q->fetchOne();

    if (!is_object($profilePermission)) {
      $profilePermission = new ProfilePermission();
      $profilePermission->setName("Student");
      $profilePermission->setDescription("This is the student permission");
      $profilePermission->save();
    }

    return $profilePermission->getId();
  }

  public function findInstructorPermissionId() {
    $q = $this->createQuery('pp')
        ->where('pp.name = ?', self::PERMISSION_INSTRUCTOR);
    $profilePermission = $q->fetchOne();

    if (!is_object($profilePermission)) {
      $profilePermission = new ProfilePermission();
      $profilePermission->setName("Instructor");
      $profilePermission->setDescription("This is the instructor permission");
      $profilePermission->save();
    }

    return $profilePermission->getId();
  }

}