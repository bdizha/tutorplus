<?php

/**
 * PaymentScheme form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PaymentSchemeForm extends BasePaymentSchemeForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $this->widgetSchema['next_payment_date'] = new tpWidgetFormDate();

        $this->widgetSchema['frequency'] = new sfWidgetFormChoice(array(
                    'choices' => PaymentSchemeTable::getInstance()->getFrequencies(),
                        )
        );

        $this->validatorSchema['frequency'] = new sfValidatorChoice(array(
                    'choices' => array_keys(PaymentSchemeTable::getInstance()->getFrequencies()),
                        )
        );
        $this->validatorSchema['balance'] = new sfValidatorString(array('required' => false));
        $this->validatorSchema['student_id']->setMessage('required', 'The <b>Student</b> field is required.');
        $this->validatorSchema['amount']->setMessage('required', 'The <b>Amount</b> field is required.');
        $this->validatorSchema['frequency']->setMessage('required', 'The <b>Frequency</b> field is required.');
        $this->validatorSchema['next_payment_date']->setMessage('invalid', 'The <b>New payment date</b> field is invalid.');
    }

}
