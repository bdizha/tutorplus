<?php

/**
 * Student form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StudentForm extends BaseStudentForm {

    protected function setupInheritance() {
        parent::setupInheritance();
        $this->widgetSchema->setNameFormat('student[%s]');
    }

    public function configure() {
        parent::configure();
        $this->widgetSchema ['username'] = new sfWidgetFormInputHidden();
        $this->widgetSchema ['password'] = new sfWidgetFormInputHidden();
        $this->widgetSchema ['password_again'] = new sfWidgetFormInputHidden();
        $this->widgetSchema ['status'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['username'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['password_again'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['status'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
    }

}