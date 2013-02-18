<?php
/**
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku <batanayi@tutorplus.org>
 */
class myValidatorProfile extends sfValidatorBase {

  public function configure($options = array(), $messages = array()) {
    $this->addOption('email_field', 'email');
    $this->addOption('password_field', 'password');
    $this->addOption('throw_global_error', false);

    $this->setMessage('invalid', 'Incorrect <b>Email</b> and/or <b>Password</b>.');
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
