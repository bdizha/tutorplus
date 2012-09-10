<?php

/**
 * StudentAcademicDetailsForm form
 *
 * @package    diem-commerce
 * @subpackage dmMailTemplate
 * @author     Your name here
 */
class StudentAcademicDetailsForm extends BaseStudentForm
{

    public function configure()
    {
        parent::configure();
        unset(
            $this['created_at'], $this['updated_at'], $this['programes_list']
        );

        $this->widgetSchema['number'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['first_name'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['gender'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['last_name'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['date_of_birth'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['username'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['email_address'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['password'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['is_active'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['courses_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Course'));
        $this->widgetSchema['courses_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['courses_list']->setLabel('Courses');

        $this->widgetSchema['programes_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Program'));
        $this->widgetSchema['programes_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['programes_list']->setLabel('Programmes');

        $this->widgetSchema['mailing_lists_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'MailingList'));
        $this->widgetSchema['mailing_lists_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['mailing_lists_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['mailing_lists_list']->setLabel('Mailinglists');
    }
}