<?php

/**
 * ProfileResetPassword form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileResetPasswordForm extends BaseProfileForm
{

    /**
     * @see sfForm
     */
    public function setup()
    {
        parent::setup();

        $this->useFields(array('password'));
        $this->widgetSchema['email'] = new sfWidgetFormInputText();
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword(array(), array("autocomplete" => "off"));
        $this->widgetSchema['password_confirmation'] = new sfWidgetFormInputPassword(array(), array("autocomplete" => "off"));

        $this->validatorSchema['password_confirmation'] = clone $this->validatorSchema['password'];
        $this->validatorSchema['password']->setOption("required", true);
        $this->validatorSchema['password_confirmation']->setOption("required", true);
        $this->validatorSchema['password']->setMessage("required", "The <b>New password</b> is required");
        $this->validatorSchema['password_confirmation']->setMessage("required", "The <b>New password confirmation</b> is required");

        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_confirmation', array(), array('invalid' => 'The <b>Two passwords</b> must be the same.')));
        $this->widgetSchema->setNameFormat('profile_reset[%s]');
    }

}