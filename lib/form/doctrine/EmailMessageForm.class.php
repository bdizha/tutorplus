<?php

/**
 * EmailMessage form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EmailMessageForm extends BaseEmailMessageForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at'], $this['is_read'], $this['is_trashed']
        );

        $user = sfContext::getInstance()->getUser();

        $this->widgetSchema['sender_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['from_email'] = new sfWidgetFormInputText();
        $this->widgetSchema['subject'] = new sfWidgetFormInputText();
        $this->widgetSchema['email_template_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['is_reply'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['previous_sender_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['previous_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['reply_to'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['status'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['to_email'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['cc_email'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['bcc_email'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['from_email'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Your <b>From email</b> is required.'));
        $this->validatorSchema['to_email'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Please specify at least a recipient.'));
        $this->validatorSchema['subject'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'Please specify the <b>Subject</b> of your message.'));
        $this->validatorSchema['body'] = new sfValidatorString(array('max_length' => 5000, 'required' => false));
        $this->validatorSchema['is_reply'] = new sfValidatorString(array('required' => false));
        $this->validatorSchema['previous_sender_id'] = new sfValidatorString(array('required' => false));
        $this->validatorSchema['previous_id'] = new sfValidatorString(array('required' => false));

        $this->setDefaults(array(
            "sender_id" => $user->getId(),
            "status" => EmailMessageTable::EMAIL_MESSAGE_STATUS_SENT,
            "from_email" => $user->getEmail()));

        $this->disableLocalCSRFProtection();
    }

}
