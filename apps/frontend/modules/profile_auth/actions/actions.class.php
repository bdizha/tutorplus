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

// 		$mailer = new tpMailer();
// 		$mailer->setTemplate('welcome-to-tutorplus');
// 		$mailer->setToEmails("Batanayi Matuku" . " <batanayi@tutorplus.org>");
// 		$mailer->addValues(
// 				array(
// 						"USER" => "Batanayi Matuku"
// 				)
// 		);
		
// 		$mailer->send();
		
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
	 */	public function executeRequestPassword($request)
	 {
	 	$this->form = new ProfileRequestPasswordForm();

	 	if ($request->isMethod('post'))
	 	{
	 		$this->getUser()->setFlash('error', true, false);
	 		$this->form->bind($request->getParameter($this->form->getName()));
	 		if ($this->form->isValid())
	 		{
	 			$this->user = Doctrine_Core::getTable('Profile')
	 			->retrieveByUsernameOrEmailAddress($this->form->getValue('email_address'));

	 			Doctrine_Core::getTable('ProfileForgotPassword')
	 			->deleteByUser($this->user);

	 			$forgotPassword = new sfGuardForgotPassword();
	 			$forgotPassword->profile_id = $this->user->id;
	 			$forgotPassword->unique_key = md5(rand() + time());
	 			$forgotPassword->expires_at = new Doctrine_Expression('NOW()');
	 			$forgotPassword->save();

	 			$this->sendRequestMail($this->user, $forgotPassword);

	 			$this->getUser()->setFlash('notice', 'Check your e-mail! You should receive something shortly!');
	 			$this->getUser()->setFlash('error', false, false);

	 			$this->redirect(sfConfig::get('app_sf_guard_plugin_password_request_url', '@sf_guard_signin'));
	 		}
	 	}
	 }

}
