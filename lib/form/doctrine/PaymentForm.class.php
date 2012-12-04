<?php

/**
 * Payment form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PaymentForm extends BasePaymentForm
{
    public function configure() {
        unset(
        $this['created_at'], $this['updated_at']
        );

        $userId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['bookkeeper'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['balance'] = new sfValidatorString(array('required' => false));
        $this->validatorSchema['student_id']->setMessage('required', 'The <b>Student</b> field is required.');
        $this->validatorSchema['amount']->setMessage('required', 'The <b>Amount</b> field is required.');
        $this->validatorSchema['reference']->setMessage('required', 'The <b>Reference</b> field is required.');
        $this->validatorSchema['comment']->setMessage('required', 'The <b>Comment</b> field is required.');

        $this->setDefaults(array(
            'bookkeeper' => $userId,
        ));
    }
}
