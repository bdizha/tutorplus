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
		$this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course_explorer");
		$this->course = Doctrine_Core::getTable('Course')->find(array($courseId));
		$this->forward404Unless($this->course, sprintf('Course does not exist (%s).', $courseId));
		$this->helper = new course_peerGeneratorHelper();
		$this->helper->setProfile($this->getUser()->getProfile());
	}

	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request) {
		$this->courseInstructorProfiles = ProfileTable::getInstance()->findByCourseId($this->course->getId(), true);
		$this->courseStudentProfiles = ProfileTable::getInstance()->findByCourseId($this->course->getId(), false);
	}

	/**
	 * Executes instructors action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeInstructors(sfWebRequest $request) {
		$this->currentInstructorIds = array();
		$this->myInstructorPeers = PeerTable::getInstance()->findByProfileIdAndIsInstructor($this->getUser()->getId(), true);

		// look for the current course profiles
		$currentCourseInstructors = ProfileCourseTable::getInstance()->findByCourseId($this->course->getId());

		foreach ($currentCourseInstructors as $currentCourseInstructor) {
			// make sure only course instructors can be delt with
			if ($currentCourseInstructor->getProfile()->getIsInstructor()) {
				$this->currentInstructorIds[] = $currentCourseInstructor->getProfileId();
			}
		}

		$peers = $request->getParameter('peers', array());

		//myToolkit::debug(array("peers" => $peers, "currentinstructors" => $this->currentInstructorIds));
		if ($request->getMethod() == "POST") {
			$toDelete = array_diff($this->currentInstructorIds, $peers);
			if (count($toDelete)) {
				ProfileCourseTable::getInstance()->deleteByCourseIdAndProfileIds($this->course->getId(), array_values($toDelete));
			}

			$toAdd = array_diff($peers, $this->currentInstructorIds);
			if (count($toAdd)) {
				foreach ($toAdd as $profileId) {
					$profileCourse = new ProfileCourse();
					$profileCourse->setProfileId($profileId);
					$profileCourse->setCourseId($this->course->getId());
					$profileCourse->save();
				}
			}

			$this->currentInstructorIds = $peers;
		}
	}

}
