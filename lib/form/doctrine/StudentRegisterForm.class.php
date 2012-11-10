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
        $studentCourseForm = new StudentCourseForm();
        $contactForm = new ContactForm();

        // build department course pairs
        foreach (range(1, 3) as $key) {
            $this->widgetSchema ['department_' . $key] = new sfWidgetFormDoctrineChoice(array('model' => $courseForm->getRelatedModelName('Department'), 'add_empty' => false));
            $this->widgetSchema ['course_' . $key] = new sfWidgetFormDoctrineChoice(array('model' => $studentCourseForm->getRelatedModelName('Course'), 'add_empty' => false));
            $this->widgetSchema ['department_' . $key]->setLabel("Department");
            $this->widgetSchema ['course_' . $key]->setLabel("Module");

            $this->validatorSchema['department_' . $key] = new sfValidatorString(array('max_length' => 255, 'required' => false));
            $this->validatorSchema['course_' . $key] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        }

        $this->validatorSchema['department_1'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Please choose your a <b>Department</b>.'));
        $this->validatorSchema['course_1'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Please choose your a <b>Course</b>.'));

        $this->widgetSchema ['year'] = new sfWidgetFormDoctrineChoice(array('model' => $academicPeriodForm->getRelatedModelName('AcademicYear'), 'add_empty' => false));
        $this->widgetSchema ['semester'] = new sfWidgetFormDoctrineChoice(array('model' => $courseForm->getRelatedModelName('AcademicPeriod'), 'add_empty' => false));
        $this->widgetSchema ['number'] = new sfWidgetFormInputText();
        $this->widgetSchema ['mobile_phone'] = new sfWidgetFormInputText();
        $this->widgetSchema ['state_province_id'] = new sfWidgetFormDoctrineChoice(array('model' => $contactForm->getRelatedModelName('StateProvince'), 'add_empty' => false));
        $this->widgetSchema ['country_id'] = new sfWidgetFormDoctrineChoice(array('model' => $contactForm->getRelatedModelName('Country'), 'add_empty' => false));

        $this->validatorSchema['year'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Academic year</b> field is required.'));
        $this->validatorSchema['semester'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Semester</b> field is required.'));
        $this->validatorSchema['number'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Unisa student number</b> field is required.'));
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