<?php

/**
 * StudentInline form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StudentInlineForm extends BaseStudentForm
{
    protected function setupInheritance()
    {
        parent::setupInheritance();
        
        $this->widgetSchema["enrollment"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["status"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["number"] = new sfWidgetFormInputHidden();
        $this->widgetSchema->setNameFormat('student[%s]');
    }
    
    public function configure()
    {
        parent::configure();
        $this->widgetSchema["is_active"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["username"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["email_address"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["password"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["password_again"] = new sfWidgetFormInputHidden();
    }
}