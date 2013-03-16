<?php

/**
 * Instructor form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InstructorForm extends BaseProfileForm
{

    protected $years = array();

    public function configure()
    {
        unset(
                $this['created_at'], $this['updated_at'], $this['salt'], $this['algorithm']
        );

        $this->widgetSchema['first_name'] = new sfWidgetFormInputText();
        $this->widgetSchema['last_name'] = new sfWidgetFormInputText();
        $this->widgetSchema['birth_date'] = new tpWidgetFormDate(array("years" => $this->getYears()));
        $this->widgetSchema['email'] = new sfWidgetFormInputText();
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword(array(), array("autocomplete" => "off"));
        $this->widgetSchema['password_confirmation'] = new sfWidgetFormInputPassword(array(), array("autocomplete" => "off"));
        $this->widgetSchema['is_active'] = new sfWidgetFormInputCheckbox();
        $this->widgetSchema->moveField('password_confirmation', 'after', 'password');

        $this->widgetSchema['permissions_list'] = new sfWidgetFormSelectCheckbox(array(
                    'choices' => ProfilePermissionTable::getInstance()->getChoices()
                ));

        $this->validatorSchema['first_name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>First name</b> field is required.'));
        $this->validatorSchema['last_name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Last name</b> field is required.'));
        $this->validatorSchema['email'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Email address</b> field is required.'));
        $this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 128, 'required' => $this->getObject()->isNew()), array('required' => 'The <b>Password</b> field is required.'));
        $this->validatorSchema['password_confirmation'] = clone $this->validatorSchema['password'];
        $this->validatorSchema['password_confirmation']->setMessage('required', 'The <b>Confirm password</b> field is required.');
        $this->validatorSchema['permissions_list']->setMessage('required', 'At least a <b>Permissions</b> choice must be selected (0 values selected).');
        $this->validatorSchema['is_active'] = new sfValidatorBoolean(array('required' => false));
        $this->validatorSchema['birth_date'] = new sfValidatorDateTime(array('required' => true), array('required' => 'The <b>Date of birth</b> field is required.', 'invalid' => 'The <b>Date of birth</b> field is invalid.'));
        $this->validatorSchema['permissions_list'] = new sfValidatorChoice(array(
                    'choices' => array_keys(ProfilePermissionTable::getInstance()->getChoices()),
                    'multiple' => true
                        ), array('required' => 'The please choose at least a permission.')
        );
        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_confirmation', array(), array('invalid' => 'The two passwords must be the same.')));
    }

    public function getYears()
    {
        return array_combine(range(date('Y') - 70, date('Y')), range(date('Y') - 70, date('Y')));
    }

}
