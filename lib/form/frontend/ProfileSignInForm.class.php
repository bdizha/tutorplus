<?php

/**
 * ProfileSignInForm
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileSignInForm extends BaseForm {

  /**
   * @see sfForm
   */
  public function setup() {
    $this->setWidgets(array(
        'email' => new sfWidgetFormInputText(),
        'password' => new sfWidgetFormInputPassword(array('type' => 'password')),
        'remember' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
        'email' => new sfValidatorEmail(),
        'password' => new sfValidatorString(),
        'remember' => new sfValidatorBoolean(),
    ));
    
    $this->validatorSchema['email']->setMessage('required', 'The <b>Email</b> field is required.');
    $this->validatorSchema['email']->setMessage('invalid', 'The <b>Email</b> field is invalid.');
    $this->validatorSchema['password']->setMessage('required', 'The <b>Password</b> field is required.');

    $this->validatorSchema->setPostValidator(new myValidatorProfile());

    $this->widgetSchema->setNameFormat('signin[%s]');

    parent::setup();
  }

}