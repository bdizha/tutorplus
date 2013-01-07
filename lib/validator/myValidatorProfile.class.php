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
    $this->addOption('username_field', 'username');
    $this->addOption('password_field', 'password');
    $this->addOption('throw_global_error', false);

    $this->setMessage('invalid', 'The Username and/or Password is invalid.');
  }

  protected function doClean($values) {
    $username = isset($values[$this->getOption('username_field')]) ? $values[$this->getOption('username_field')] : '';
    $password = isset($values[$this->getOption('password_field')]) ? $values[$this->getOption('password_field')] : '';
    
    // don't allow to sign in with an empty username
    if ($username) {
      $profile = $this->getTable()->retrieveByUsernameOrEmailAddress($username);
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

    throw new sfValidatorErrorSchema($this, array($this->getOption('username_field') => new sfValidatorError($this, 'invalid')));
  }

  protected function getTable() {
    return Doctrine_Core::getTable('Profile');
  }

}
