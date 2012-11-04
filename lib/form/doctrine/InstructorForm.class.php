<?php

/**
 * Instructor form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InstructorForm extends BaseInstructorForm {

    protected function setupInheritance() {
        parent::setupInheritance();

        $this->widgetSchema->setNameFormat('instructor[%s]');

        $this->widgetSchema['employment_start_date'] = new tpWidgetFormDate();
        $this->widgetSchema['employment_end_date'] = new tpWidgetFormDate();
        $this->widgetSchema['is_active'] = new sfWidgetFormInputCheckbox();
        $this->widgetSchema['is_student'] = new sfWidgetFormInputCheckbox();

        $this->validatorSchema['is_active'] = new sfValidatorBoolean(array('required' => false));
        $this->validatorSchema['employment']->setMessage('required', 'The <b>Employment</b> field is required.');
    }

    public function configure() {
        parent::configure();
        $this->widgetSchema ['username'] = new sfWidgetFormInputHidden();
        $this->widgetSchema ['password'] = new sfWidgetFormInputHidden();
        $this->widgetSchema ['password_again'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['username'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['password_again'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
    }

}