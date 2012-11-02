<?php

/**
 * Base actions for the sfGuardForgotPasswordPlugin sfGuardForgotPassword module.
 *
 * @package     sfGuardForgotPasswordPlugin
 * @subpackage  sfGuardForgotPassword
 * @author      Your name here
 * @version     SVN: $Id: BasesfGuardForgotPasswordActions.class.php 32976 2011-09-01 16:01:23Z gimler $
 */
abstract class BasesfGuardForgotPasswordActions extends sfActions {

    public function preExecute() {
        if ($this->getUser()->isAuthenticated()) {
            $this->redirect('@homepage');
        }
    }

    public function executeIndex($request) {
        $class = sfConfig::get('app_sf_guard_plugin_request_forgot_password_form', 'sfGuardRequestForgotPasswordForm');
        $this->form = new $class();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->user = Doctrine_Core::getTable('sfGuardUser')
                        ->retrieveByUsernameOrEmailAddress($this->form->getValue('email_address'));

                Doctrine_Core::getTable('sfGuardForgotPassword')
                        ->deleteByUser($this->user);

                $forgotPassword = new sfGuardForgotPassword();
                $forgotPassword->user_id = $this->user->id;
                $forgotPassword->unique_key = md5(rand() + time());
                $forgotPassword->expires_at = new Doctrine_Expression('NOW()');
                $forgotPassword->save();

                $this->sendRequestMail($this->user, $forgotPassword);

                $this->getUser()->setFlash('notice', 'Check your e-mail! You should receive something shortly!');

                $this->redirect(sfConfig::get('app_sf_guard_plugin_password_request_url', '@sf_guard_signin'));
            }
        }
    }

    /**
     * Send the request password email to the user
     *
     * @param object                $user           the user object
     * @param sfGuardForgotPassword $forgotPassword the forgot password record
     *
     * @return void
     */
    protected function sendRequestMail($user, $forgotPassword) {
        $mailer = new tpMailer();
        $mailer->setTemplate('reset-your-tutorplus-password');
        $mailer->setToEmails($user->getName() . " <" . $user->getEmail() . ">");
        $mailer->addValues(array(
            "USER" => $user->getName(),
            "RESET_PASSWORD_LINK" => $this->getPartial('email_template/link', array(
                'title' => $this->generateUrl('sf_guard_forgot_password_change', array("unique_key" => $forgotPassword->getUniqueKey()), 'absolute=true'),
                'route' => "@sf_guard_forgot_password_change?unique_key=" . $forgotPassword->getUniqueKey())
                )));

        $mailer->send();
    }

    public function executeChange($request) {
        $this->forgotPassword = $this->getRoute()->getObject();
        $this->user = $this->forgotPassword->User;
        $this->form = new sfGuardChangeUserPasswordForm($this->user);

        if ($request->isMethod('post')) {
            //die("testing");
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();

                $this->forgotPassword->delete();

                //$this->sendChangeMail($this->user, $request['sf_guard_user']['password']);

                $this->getUser()->setFlash('notice', 'Your password has been updated successfully!');

                $this->redirect(sfConfig::get('app_sf_guard_plugin_password_change_url', '@sf_guard_signin'));
            } else {
                $this->getUser()->setFlash('error', true);
            }
        }
    }

    /**
     * Send email to the user with new password
     *
     * @param object $user     user object
     * @param string $password user password
     *
     * @return void
     */
    protected function sendChangeMail($user, $password) {
        $i18n = $this->getContext()->getI18N();

        $message = $this->getMailer()->compose(
                        sfConfig::get('app_sf_guard_plugin_default_from_email', 'from@noreply.com'), $user->email_address, $i18n->__('New Password for %name%', array('%name%' => $user->username), 'sf_guard'), $this->getPartial('sfGuardForgotPassword/new_password', array('user' => $user, 'password' => $password))
                )->setContentType('text/html');

        $this->getMailer()->send($message);
    }

}
