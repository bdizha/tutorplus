<?php

/**
 * EmailTemplate form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EmailTemplateForm extends BaseEmailTemplateForm
{
    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );
        
        $this->widgetSchema['subject'] = new sfWidgetFormInputText();
        $this->widgetSchema['vars'] = new sfWidgetFormInputText();
        $this->widgetSchema['from_email'] = new sfWidgetFormInputText();
        $this->widgetSchema['to_email'] = new sfWidgetFormInputText();
        $this->widgetSchema['cc_email'] = new sfWidgetFormInputText();
        $this->widgetSchema['bcc_email'] = new sfWidgetFormInputText();
        $this->widgetSchema['reply_to'] = new sfWidgetFormInputText();

        $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Name</b> field is required.'));
        $this->validatorSchema['from_email'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>From email</b> field is required.'));
        $this->validatorSchema['reply_to'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Reply to</b> field is required.'));
        $this->validatorSchema['subject'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Subject</b> field is required.'));
        $this->validatorSchema['body'] = new sfValidatorString(array('max_length' => 5000, 'required' => true), array('required' => 'The <b>Body</b> field is required.'));
    }

}
