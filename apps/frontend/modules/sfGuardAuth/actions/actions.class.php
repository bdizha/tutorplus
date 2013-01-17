<?php
/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardAuthActions extends sfActions {

  public function executeLogIn($request) {
    $user = $this->getUser();
    if ($user->isAuthenticated()) {
      return $this->redirect('@dashboard');
    }

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

  public function executeSignOut($request) {
    $this->getUser()->signOut();

    $signoutUrl = $request->getReferer();
    $this->redirect('' != $signoutUrl ? $signoutUrl : '@home');
  }

  public function executeSecure($request) {
    $this->getResponse()->setStatusCode(403);
  }

}
