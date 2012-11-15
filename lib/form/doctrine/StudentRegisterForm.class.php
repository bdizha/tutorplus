<?php

/**
 * StudentRegister form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StudentRegisterForm extends StudentForm {

    protected function setupInheritance() {
        parent::setupInheritance();

        $courseForm = new CourseForm();
        $academicPeriodForm = new AcademicPeriodForm();
        $contactForm = new ContactForm();

        // build department course pairs
        foreach (DepartmentTable::getInstance()->findAll() as $department) {
            foreach ($department->getCourses() as $course) {
                $name = preg_replace('/[^a-z0-9_]/', '_', strtolower($course->getCode()));
                $this->widgetSchema[$name] = new sfWidgetFormInputCheckbox(array(), array("value" => $course->getId()));
            }
        }
        
        foreach (DepartmentTable::getInstance()->findAll() as $department) {
            foreach ($department->getCourses() as $course) {
                $name = preg_replace('/[^a-z0-9_]/', '_', strtolower($course->getCode()));
                $this->validatorSchema[$name] = new sfValidatorString(array('max_length' => 255, 'required' => false));
            }
        }

        $this->widgetSchema ['year'] = new sfWidgetFormDoctrineChoice(array('model' => $academicPeriodForm->getRelatedModelName('AcademicYear'), 'add_empty' => false));
        $this->widgetSchema ['semester'] = new sfWidgetFormDoctrineChoice(array('model' => $courseForm->getRelatedModelName('AcademicPeriod'), 'add_empty' => false));
        $this->widgetSchema ['number'] = new sfWidgetFormInputText();
        $this->widgetSchema ['mobile_phone'] = new sfWidgetFormInputText();
        $this->widgetSchema ['state_province_id'] = new sfWidgetFormDoctrineChoice(array('model' => $contactForm->getRelatedModelName('StateProvince'), 'add_empty' => false));
        $this->widgetSchema ['country_id'] = new sfWidgetFormDoctrineChoice(array('model' => $contactForm->getRelatedModelName('Country'), 'add_empty' => false));

        $this->validatorSchema['year'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Academic year</b> field is required.'));
        $this->validatorSchema['semester'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Semester</b> field is required.'));
        $this->validatorSchema['number'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Student number</b> field is required.'));
        $this->validatorSchema['mobile_phone'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Mobile phone</b> field is required.'));
        $this->validatorSchema['state_province_id'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Province</b> field is required.'));
        $this->validatorSchema['country_id'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Country</b> field is required.'));
        $this->widgetSchema->setNameFormat('student[%s]');
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