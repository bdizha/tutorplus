<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardValidatorUser.class.php 31850 2011-01-18 17:22:08Z gimler $
 */
class sfGuardValidatorUser extends sfValidatorBase
{

    public function configure($options = array(), $messages = array())
    {
        $this->addOption('username_field', 'username');
        $this->addOption('password_field', 'password');
        $this->addOption('throw_global_error', false);

        $this->setMessage('invalid', 'The entered <b>credentials</b> are invalid.');
    }

    protected function doClean($values)
    {
        $username = isset($values[$this->getOption('username_field')]) ? $values[$this->getOption('username_field')] : '';
        $password = isset($values[$this->getOption('password_field')]) ? $values[$this->getOption('password_field')] : '';

        $allowEmail = sfConfig::get('app_sf_guard_plugin_allow_login_with_email', true);
        $method = $allowEmail ? 'retrieveByUsernameOrEmailAddress' : 'retrieveByUsername';

        $message = "";

        // don't allow to sign in with an empty username
        if ($username)
        {
            $message = "The entered <b>credentials</b> are invalid.";
            if ($callable = sfConfig::get('app_sf_guard_plugin_retrieve_by_username_callable'))
            {
                $user = call_user_func_array($callable, array($username));
            }
            else
            {
                $user = $this->getTable()->$method($username);
            }
            // user exists?
            if ($user)
            {
                // password is ok?
                if ($user->getIsActive() && $user->checkPassword($password))
                {
                    return array_merge($values, array('user' => $user));
                }
            }
        }

        if ($this->getOption('throw_global_error'))
        {
            throw new sfValidatorError($this, "The entered <b>credentials</b> are invalid.");
        }

        throw new sfValidatorErrorSchema($this, array($this->getOption('username_field') => new sfValidatorError($this, $message)));
    }

    protected function getTable()
    {
        return Doctrine_Core::getTable('sfGuardUser');
    }

}
