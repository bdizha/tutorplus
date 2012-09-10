<?php

/**
 * EmailTemplate form.
 *
 * @package    ecollegeplus
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

        $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>name</b> field is required.'));
        $this->validatorSchema['from_email'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>from email</b> field is required.'));
        $this->validatorSchema['reply_to'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>reply to</b> field is required.'));
        $this->validatorSchema['subject'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>subject</b> field is required.'));
        $this->validatorSchema['body'] = new sfValidatorString(array('max_length' => 5000, 'required' => true), array('required' => 'The <b>body</b> field is required.'));
    }

}
