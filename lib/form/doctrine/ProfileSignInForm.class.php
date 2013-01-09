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
        'username' => new sfWidgetFormInputText(),
        'password' => new sfWidgetFormInputPassword(array('type' => 'password')),
        'remember' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
        'username' => new sfValidatorString(),
        'password' => new sfValidatorString(),
        'remember' => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(new myValidatorProfile());

    $this->widgetSchema->setNameFormat('signin[%s]');

    parent::setup();
  }

}