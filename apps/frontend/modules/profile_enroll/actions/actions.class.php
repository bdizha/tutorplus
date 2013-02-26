<?php

require_once dirname(__FILE__) . '/../lib/profile_enrollGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profile_enrollGeneratorHelper.class.php';

/**
 * profile_enroll actions.
 *
 * @package    tutorplus.org
 * @subpackage profile_enroll
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_enrollActions extends autoProfile_enrollActions {

	public function preExecute() {
		$this->redirectIf($this->getUser()->isAuthenticated(), "@dashboard");
		parent::preExecute();
	}

	public function processEmails($profile, $values, $request, $isNew) {
		if(!$isNew){
			$toEmails = array($profile->getEmail() => $profile->getName());
			$mailer = new tpMailer();
			$mailer->setTemplate('welcome-to-tutorplus');
			$mailer->setToEmails($toEmails);
			$mailer->addValues(
					array(
							"USER" => $profile->getName(),
							"EMAIL" => $profile->getEmail(),
							"PASSWORD" => $values["password"]
					)
			);

			$mailer->send();
		}
	}

	public function processUpdates($profile, $values, $request, $isNew){
		if ($values["is_instructor"]) {
			// set instructor permissions
			$profile->link("Permissions", array(ProfilePermissionTable::getInstance()->findInstructorPermissionId()));
		} else {
			// set student permissions
			$profile->link("Permissions", array(ProfilePermissionTable::getInstance()->findStudentPermissionId()));
		}
		$profile->save();

		$this->getUser()->signin($profile, false);

		$logInUrl = $this->getUser()->getReferer($request->getReferer());

		$this->getUser()->setFlash('notice', 'Greetings from the TutorPlus team, and we wish you a wonderful time with us.');
		$this->getUser()->setFlash('error', false, false);

		return $this->redirect('' != $logInUrl ? $logInUrl : '@dashboard');
	}

}
