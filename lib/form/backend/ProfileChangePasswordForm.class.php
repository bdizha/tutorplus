<?php

/**
 * ProfileChangePasswordForm for changing a users password
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class ProfileChangePasswordForm extends BasesfGuardUserForm
{
  public function setup()
  {
    parent::setup();

    $this->useFields(array('password'));
    
    $this->widgetSchema['password'] = new sfWidgetFormInputPassword(); 
    $this->widgetSchema['password_current'] = new sfWidgetFormInputPassword();
    $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
    
    $this->validatorSchema['password']->setOption('required', true);    
    $this->validatorSchema['password_current'] = clone $this->validatorSchema['password'];    
    $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
    
    $this->validatorSchema['password']->setMessage("required", "The <b>New password</b> is required");
    $this->validatorSchema['password_current']->setMessage("required", "The <b>Current password</b> is required");
    $this->validatorSchema['password_again']->setMessage("required", "The <b>New password confirmation</b> is required");    

    $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The <b>two passwords</b> must be the same.')));
  }
}