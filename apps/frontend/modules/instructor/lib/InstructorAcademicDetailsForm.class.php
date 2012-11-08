<?php

/**
 * InstructorAcademicDetailsForm form
 *
 * @package    diem-commerce
 * @subpackage dmMailTemplate
 * @author     Your name here
 */
class InstructorAcademicDetailsForm extends BaseInstructorForm
{

    public function configure()
    {
        parent::configure();
        unset(
            $this['created_at'], $this['updated_at']
        );

        $this->widgetSchema['first_name'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['last_name'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['date_of_birth'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['username'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['email_address'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['password'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['is_active'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['courses_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Course'));
        $this->widgetSchema['courses_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['courses_list']->setLabel('Courses');

        $this->widgetSchema['mailing_lists_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'MailingList'));
        $this->widgetSchema['mailing_lists_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['mailing_lists_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['mailing_lists_list']->setLabel('Mailinglists');


        $this->validatorSchema['gender']->setOption('required', false);
    }

}