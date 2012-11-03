<?php

/**
 * StudentInline form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StudentAccountSettingsForm extends BaseStudentForm
{
    protected function setupInheritance()
    {
        parent::setupInheritance();
        
        $this->widgetSchema["enrollment"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["status"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["number"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["high_school"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["studied_at"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["current_study"] = new sfWidgetFormInputHidden();
        $this->widgetSchema->setNameFormat('student[%s]');
    }
    
    public function configure()
    {
        parent::configure();
        
        $this->widgetSchema["gender"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["middle_name"] = new sfWidgetFormInputHidden();        
        $this->widgetSchema["first_name"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["last_name"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["date_of_birth"] = new sfWidgetFormInputHidden();
    }
}