<?php

/**
 * profile_auth actions.
 *
 * @package    tutorplus.org
 * @subpackage profile_auth
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profile_authActions extends sfActions
{
	/**
	 * Execute the sign in request
	 *
	 * @param sfRequest $request The current sfRequest object
	 *
	 */
	public function executeSignIn($request) {
		$user = $this->getUser();
		$this->redirectIf($this->getUser()->isAuthenticated(), "@dashboard");

		$this->form = new ProfileSignInForm();
		if ($request->isMethod('post')) {
			$this->getUser()->setFlash('error', true, false);
			$this->form->bind($request->getParameter($this->form->getName()));
			if ($this->form->isValid()) {
				$values = $this->form->getValues();
				$this->getUser()->signin($values['profile'], array_key_exists('remember', $values) ? $values['remember'] : false);

				$logInUrl = $user->getReferer($request->getReferer());

				$this->getUser()->setFlash('notice', 'Greetings from the TutorPlus team, and we wish you a wonderful learning session.');
				$this->getUser()->setFlash('error', false, false);

				return $this->redirect('' != $logInUrl ? $logInUrl : '@dashboard');
			}
		} else {
			if ($request->isXmlHttpRequest()) {
				$this->getResponse()->setHeaderOnly(true);
				$this->getResponse()->setStatusCode(401);

				return sfView::NONE;
			}

			$user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

			$module = sfConfig::get('sf_login_module');
			if ($this->getModuleName() != $module) {
				return $this->redirect($module . '/' . sfConfig::get('sf_login_action'));
			}

			$this->getResponse()->setStatusCode(401);
		}
	}


	/**
	 * Execute the sign out request
	 *
	 * @param sfRequest $request The current sfRequest object
	 *
	 */
	public function executeSignOut($request) {
		$this->getUser()->signOut();

		$signoutUrl = $request->getReferer();
		$this->redirect('' != $signoutUrl ? $signoutUrl : '@home');
	}


	/**
	 * Execute the secure request
	 *
	 * @param sfRequest $request The current sfRequest object
	 *
	 */
	public function executeSecure($request) {
		$this->getResponse()->setStatusCode(403);
	}

	/**
	 * Execute the request password request
	 *
	 * @param sfRequest $request The current sfRequest object
	 *
	 */	
	 public function executeRequestPassword($request)
	 {
	 	$this->form = new ProfileRequestPasswordForm();
	 	$uniqueKey = $request->getParameter("unique_key", null);

	 	if ($request->isMethod('post'))
	 	{
	 		$this->getUser()->setFlash('error', true, false);
	 		$this->form->bind($request->getParameter($this->form->getName()));
	 		if ($this->form->isValid())
	 		{	 			
	 			$profileForgotPassword = ProfileForgotPasswordTable::getInstance()->findOneByUnique($uniqueKey);
	 			$this->forward404Unless($profileForgotPassword);
	 			
	 			$profile = $profileForgotPassword->getProfile();

	 			Doctrine_Core::getTable('ProfileForgotPassword')
	 			->deleteByProfileId($profile->getId());

	 			$profileForgotPassword = new ProfileForgotPassword();
	 			$profileForgotPassword->setProfileId($profile->getId());
	 			$profileForgotPassword->setUniqueKey(md5(rand() + time()));
	 			$profileForgotPassword->setExpiresAt(new Doctrine_Expression('NOW()'));
	 			$profileForgotPassword->save();

	 			$this->sendPasswordRequestMail($profile, $profileForgotPassword);
	 			$this->getUser()->setFlash('notice', 'Check your e-mail! You should receive something shortly!');
	 		}
	 	}
	 }

	 public function executeResetPassword($request)
	 {
	 	$this->form = new ProfileChangePasswordForm($this->user);

	 	if ($request->isMethod('post'))
	 	{
	 		$this->form->bind($request->getParameter($this->form->getName()));
	 		if ($this->form->isValid())
	 		{
	 			$this->form->save();
	 			$values = $this->form->getValues();

	 			$profileForgotPassword = ProfileForgotPasswordTable::getInstance()->findOneByUnique($uniqueKey);
	 			$this->forward404Unless($profileForgotPassword);
	 			
	 			$profile = $profileForgotPassword->getProfile();

	 			Doctrine_Core::getTable('ProfileForgotPassword')
	 			->deleteByProfileId($profile->getId());

	 			$profileForgotPassword = new ProfileForgotPassword();
	 			$profileForgotPassword->setProfileId($profile->getId());
	 			$profileForgotPassword->setUniqueKey(md5(rand() + time()));
	 			$profileForgotPassword->setExpiresAt(new Doctrine_Expression('NOW()'));
	 			$profileForgotPassword->save();

	 			$this->sendChangeMail($profile, $profileForgotPassword, $values['password']);

	 			$this->getUser()->setFlash('notice', 'Password updated successfully!');
	 			
	 			// automatically sign in the profile
	 		}
	 	}
	 }

	 /**
	  * Send email to the user with new password
	  *
	  * @param Profile $profile
	  * @param array $formValues 
	  *
	  * @return void
	  */
	 protected function sendPasswordChangeMail($profile, ProfileForgotPassword $forgotPassword, $password)
	 {	
	 	$mailer = new tpMailer();
	 	$mailer->setTemplate('password-change-request');
	 	$mailer->setToEmails($profile->getName() . " <bdizha@gmail.com>");
	 	$mailer->addValues(
	 			array(
	 					"PASSWORD" => $password,
	 					"PASSWORD_UNIQUE_KEY" => $forgotPassword->getUniqueKey()
	 			)
	 	);

	 	$mailer->send();
	 }


	 /**
	  * Send email to the profile with a password reset link
	  *
	  * @param Profile $profile
	  * @param ProfileForgotPassword $forgotPassword
	  *
	  * @return void
	  */
	 public function sendPasswordRequestMail(Profile $profile, ProfileForgotPassword $forgotPassword) {
	 	$mailer = new tpMailer();
	 	$mailer->setTemplate('password-change-request');
	 	$mailer->setToEmails($profile->getName() . " <bdizha@gmail.com>");
	 	$mailer->addValues(
	 			array(
	 					"PASSWORD_UNIQUE_KEY" => $forgotPassword->getUniqueKey()
	 			)
	 	);

	 	$mailer->send();
	 }

}
