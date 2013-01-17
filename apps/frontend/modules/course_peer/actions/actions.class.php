<?php

/**
 * course_peer actions.
 *
 * @package    tutorplus
 * @subpackage course_peer
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_peerActions extends sfActions {

  public function preExecute() {
    $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
    $this->course = Doctrine_Core::getTable('Course')->find(array($courseId));
    $this->forward404Unless($this->course, sprintf('Course does not exist (%s).', $courseId));
    $this->helper = new course_peerGeneratorHelper();
  }

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request) {
    $this->courseInstructors = ProfileCourseTable::getInstance()->findByCourseIdAndIsInstructor($this->course->getId(), true);
    $this->courseStudents = ProfileCourseTable::getInstance()->findByCourseIdAndIsInstructor($this->course->getId(), false);
  }

  /**
   * Executes choose students action
   *
   * @param sfRequest $request A request object
   */
  public function executeChooseStudents(sfWebRequest $request) {
    $this->currentStudentIds = array();

    // fetch all profiles for now
    $this->students = ProfileTable::getInstance()->findByIsInstructor(false);

    // look for the current course profiles
    $currentCourseStudents = ProfileCourseTable::getInstance()->findByCourseId($this->course->getId());

    foreach ($currentCourseStudents as $currentCourseStudent) {
      $this->currentStudentIds[] = $currentCourseStudent->getProfileId();
    }

    $studentIds = $request->getParameter("student", array());
    if ($request->getMethod() == "POST") {
      $toDelete = array_diff($this->currentStudentIds, $studentIds);
      if (count($toDelete)) {
        ProfileCourseTable::getInstance()->deleteByCourseIdAndProfileIds($this->course->getId(), array_values($toDelete));
      }

      $toAdd = array_diff($studentIds, $this->currentStudentIds);
      if (count($toAdd)) {
        foreach ($toAdd as $profileId) {
          $profileCourse = new ProfileCourse();
          $profileCourse->setProfileId($profileId);
          $profileCourse->setCourseId($this->course->getId());
          $profileCourse->save();
        }
      }

      $this->currentStudentIds = $studentIds;
    }
  }

  /**
   * Executes choose instructors action
   *
   * @param sfRequest $request A request object
   */
  public function executeChooseInstructors(sfWebRequest $request) {
    $this->currentInstructorIds = array();

    // fetch all instructors for now
    $this->instructors = ProfileTable::getInstance()->findByIsInstructor(true);

    // look for the current course profiles
    $currentCourseInstructors = ProfileCourseTable::getInstance()->findByCourseId($this->course->getId());

    foreach ($currentCourseInstructors as $currentCourseInstructor) {
      $this->currentInstructorIds[] = $currentCourseInstructor->getProfileId();
    }

    $instructorIds = $request->getParameter("instructor", array());
    if ($request->getMethod() == "POST") {
      $toDelete = array_diff($this->currentInstructorIds, $instructorIds);
      if (count($toDelete)) {
        ProfileCourseTable::getInstance()->deleteByCourseIdAndProfileIds($this->course->getId(), array_values($toDelete));
      }

      $toAdd = array_diff($instructorIds, $this->currentInstructorIds);
      if (count($toAdd)) {
        foreach ($toAdd as $profileId) {
          $profileCourse = new ProfileCourse();
          $profileCourse->setProfileId($profileId);
          $profileCourse->setCourseId($this->course->getId());
          $profileCourse->save();
        }
      }

      $this->currentInstructorIds = $instructorIds;
    }
  }

  /**
   * Executes studends action
   *
   * @param sfRequest $request A request object
   */
  public function executeStudents(sfWebRequest $request) {
    $this->courseStudents = ProfileCourseTable::getInstance()->findByCourseIdAndIsInstructor($this->course->getId(), false);    
  }

  /**
   * Executes instructors action
   *
   * @param sfRequest $request A request object
   */
  public function executeInstructors(sfWebRequest $request) {
    $this->courseInstructors = ProfileCourseTable::getInstance()->findByCourseIdAndIsInstructor($this->course->getId(), true);
  }

}
