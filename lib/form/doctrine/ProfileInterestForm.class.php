<?php

/**
 * ProfileInterest form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileInterestForm extends BaseProfileInterestForm {

    public function configure() {
        $userId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['name']    = new sfWidgetFormInputText();

        $this->validatorSchema['name']->setMessage('required', 'The <b>Name</b> field is required.');
        $this->validatorSchema['name']->setMessage('max_length', 'Please specify the max length message here.');

        $this->setDefaults(array(
            'user_id' => $userId
        ));
    }

}
