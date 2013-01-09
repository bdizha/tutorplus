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
class myValidatorProfile extends sfValidatorBase {

  public function configure($options = array(), $messages = array()) {
    $this->addOption('email_field', 'email');
    $this->addOption('password_field', 'password');
    $this->addOption('throw_global_error', false);

    $this->setMessage('invalid', 'The Email and/or Password is invalid.');
  }

  protected function doClean($values) {
    $email = isset($values[$this->getOption('email_field')]) ? $values[$this->getOption('email_field')] : '';
    $password = isset($values[$this->getOption('password_field')]) ? $values[$this->getOption('password_field')] : '';
    
    // don't allow to sign in with an empty username
    if ($email) {
      $profile = $this->getTable()->retrieveByEmail($email);
      // user exists?
      if ($profile) {
        // password is ok?
        if ($profile->getIsActive() && $profile->checkPassword($password)) {
          return array_merge($values, array('profile' => $profile));
        }
      }
    }

    if ($this->getOption('throw_global_error')) {
      throw new sfValidatorError($this, 'invalid');
    }

    throw new sfValidatorErrorSchema($this, array($this->getOption('email_field') => new sfValidatorError($this, 'invalid')));
  }

  protected function getTable() {
    return Doctrine_Core::getTable('Profile');
  }

}
