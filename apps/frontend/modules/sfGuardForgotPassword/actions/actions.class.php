<?php

require_once(dirname(__FILE__) . '/../../../../../plugins/sfDoctrineGuardPlugin/modules/sfGuardForgotPassword/lib/BasesfGuardForgotPasswordActions.class.php');

/**
 * sfGuardForgotPassword actions.
 * 
 * @package    sfGuardForgotPasswordPlugin
 * @subpackage sfGuardForgotPassword
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class sfGuardForgotPasswordActions extends BasesfGuardForgotPasswordActions
{

    public function executeIndex($request)
    {
        $this->form = new sfGuardRequestForgotPasswordForm();

        if ($request->isMethod('post'))
        {
            $this->getUser()->setFlash('error', true, false);
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid())
            {
                $this->user = Doctrine_Core::getTable('sfGuardUser')
                    ->retrieveByUsernameOrEmailAddress($this->form->getValue('email_address'));

                Doctrine_Core::getTable('sfGuardForgotPassword')
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