<?php

/**
 * ProfileRequestPasswordForm
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileRequestPasswordForm extends BaseForm {

	/**
	 * @see sfForm
	 */
	public function setup() {
		$this->setWidgets(array(
				'email' => new sfWidgetFormInputText(),
		));

		$this->setValidators(array(
				'email' => new sfValidatorEmail()
		));

		$this->validatorSchema['email']->setMessage('required', 'The <b>Email</b> field is required.');
		$this->validatorSchema['email']->setMessage('invalid', 'The <b>Email</b> field is invalid.');

		$this->validatorSchema->setPostValidator(new myValidatorEmail());
		
		$this->widgetSchema->setNameFormat('request_password[%s]');
		parent::setup();
	}

}