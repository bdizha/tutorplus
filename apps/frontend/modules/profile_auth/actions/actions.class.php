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
		if ($request->isMethod('post'))
		{
			$this->form->bind($request->getParameter($this->form->getName()));
			if ($this->form->isValid())
			{
				$values = $this->form->getValues();
				$profileEmail = $values['email'];
				$profile = ProfileTable::getInstance()->retrieveByEmail($profileEmail);
				$this->forward404Unless($profile);

				Doctrine_Core::getTable('ProfileForgotPassword')
				->deleteByProfileId($profile->getId());

				$profileForgotPassword = new ProfileForgotPassword();
				$profileForgotPassword->setProfileId($profile->getId());
				$profileForgotPassword->setUniqueKey(md5(rand() + time()));
				$profileForgotPassword->setExpiresAt(date('Y-m-d H:i:s', strtotime("NOW + 2 hours")));
				$profileForgotPassword->save();

				$this->sendPasswordRequestMail($profile, $profileForgotPassword);
				$this->getUser()->setFlash('notice', 'A password link has been sent to your email.');

				return $this->redirect('@profile_sign_in');
			}
			else{
				$this->getUser()->setFlash('error', true, false);
			}
		}
	}

	public function executeResetPassword($request)
	{
		$uniqueKey = $request->getParameter("unique_key");
		$profileForgotPassword = ProfileForgotPasswordTable::getInstance()->findOneByUniqueKey($uniqueKey);
		$this->forward404Unless($profileForgotPassword);

		$profile = $profileForgotPassword->getProfile();
		$this->form = new ProfileResetPasswordForm($profile);

		if ($request->isMethod('post'))
		{
			$this->form->bind($request->getParameter($this->form->getName()));
			if ($this->form->isValid())
			{
				$this->form->save();
				$values = $this->form->getValues();

				Doctrine_Core::getTable('ProfileForgotPassword')
				->deleteByProfileId($profile->getId());

				$profileForgotPassword = new ProfileForgotPassword();
				$profileForgotPassword->setProfileId($profile->getId());
				$profileForgotPassword->setUniqueKey(md5(rand() + time()));
				$profileForgotPassword->setExpiresAt(date('Y-m-d H:i:s', strtotime("NOW + 2 hours")));
				$profileForgotPassword->save();

				$this->sendPasswordChangeMail($profile, $profileForgotPassword, $values['password']);

				$this->getUser()->setFlash('notice', 'Your password has been updated successfully!');

				// automatically sign in the profile
				$this->getUser()->signin($profile, false);
				return $this->redirect('@dashboard');
			}
			else{
				$this->getUser()->setFlash('error', true, false);
			}
		}
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
		$toEmails = array($profile->getEmail() => $profile->getName());
		$mailer = new tpMailer();
		$mailer->setTemplate('password-change-request');
		$mailer->setToEmails($toEmails);
		$mailer->addValues(
				array(
						"USER" => $profile->getName(),
						"PASSWORD_UNIQUE_KEY" => $forgotPassword->getUniqueKey()
				)
		);

		$mailer->send();
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
		$toEmails = array($profile->getEmail() => $profile->getName());
		$mailer = new tpMailer();
		$mailer->setTemplate('password-change-confirmation');
		$mailer->setToEmails($toEmails);
		$mailer->addValues(
				array(
						"USER" => $profile->getName(),
						"PASSWORD" => $password,
						"PASSWORD_UNIQUE_KEY" => $forgotPassword->getUniqueKey()
				)
		);

		$mailer->send();
	}

}
