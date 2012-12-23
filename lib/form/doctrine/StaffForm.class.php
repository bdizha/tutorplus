<?php

/**
 * Staff form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StaffForm extends BaseStaffForm {

    protected function setupInheritance() {
        parent::setupInheritance();

        $this->widgetSchema->setNameFormat('staff[%s]');

        $this->widgetSchema['employment_start_date'] = new tpWidgetFormDate();
        $this->widgetSchema['employment_end_date'] = new tpWidgetFormDate();
        $this->widgetSchema['is_active'] = new sfWidgetFormInputCheckbox();
        $this->widgetSchema['is_student'] = new sfWidgetFormInputCheckbox();
        
        $this->widgetSchema['employment'] = new sfWidgetFormChoice(array(
                    'choices' => StaffTable::getInstance()->getEmploymentTypes(),
                        )
        );

        $this->validatorSchema['is_active'] = new sfValidatorBoolean(array('required' => false));
        $this->validatorSchema['employment'] = new sfValidatorChoice(array(
                    'choices' => array_keys(StaffTable::getInstance()->getEmploymentTypes()),
                        )
        );
        $this->validatorSchema['employment']->setMessage('required', 'The <b>Employment</b> field is required.');
    }

    /**
     * Updates the user merged form
     */
    protected function updateUser()
    {
        if (!is_null($user = $this->getUser()))
        {
            if (!$user->getId())
            {
                $user->set('algorithm', 'sha1');
                $user->set('username', $this->getValue("username"));
                $user->set('password', "batanayi"); //substr(md5(rand() + time()), 0), 8);
                $user->set('email_address', $this->getValue("email_address"));
            }
            $user->set('first_name', $this->getValue("first_name"));
            $user->set('last_name', $this->getValue("last_name"));
            $user->set('email_address', $this->getValue("email_address"));
            $user->save();

            unset($this->values['username']);
            $this->setValue('user_id', $user->get('id'));
        }
    }

}
