<?php

/**
 * StudentInline form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileAccountSettingsForm extends BasesfGuardUserForm
{

    public function setup()
    {
        parent::setup();

        $this->useFields(array('username', 'email_address', 'password'));

        $this->widgetSchema['username'] = new sfWidgetFormInputText();
        $this->widgetSchema['email_address'] = new sfWidgetFormInputText();
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword(array(), array("autocomplete" => "off"));
        $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword(array(), array("autocomplete" => "off"));
        $this->widgetSchema->moveField('password_again', 'after', 'password');

        $this->validatorSchema['email_address'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>email address</b> field is required.'));
        $this->validatorSchema['username'] = new sfValidatorString(array('max_length' => 128, 'required' => true), array('required' => 'The <b>username</b> field is required.'));
        $this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 128, 'required' => $this->getObject()->isNew()), array('required' => 'The <b>Password</b> field is required.'));
        $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
        $this->validatorSchema['password_again']->setMessage('required', 'The <b>Confirm password</b> field is required.');
        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));
    }

}