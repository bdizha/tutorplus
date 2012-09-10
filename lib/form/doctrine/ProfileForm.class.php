<?php

/**
 * Profile form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm
{

    public function configure()
    {
        $this->formatDateFields();
        unset(
            $this['created_at'], $this['updated_at']
        );

        $this->widgetSchema['first_name'] = new sfWidgetFormInputText();
        $this->widgetSchema['last_name'] = new sfWidgetFormInputText();
        $this->widgetSchema['date_of_birth'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
        $this->widgetSchema['username'] = new sfWidgetFormInputText();
        $this->widgetSchema['email_address'] = new sfWidgetFormInputText();
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword(array(), array("autocomplete" => "off"));
        $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword(array(), array("autocomplete" => "off"));
        $this->widgetSchema['is_active'] = new sfWidgetFormInputCheckbox();
        $this->widgetSchema->moveField('password_again', 'after', 'password');

        $this->validatorSchema['first_name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>first name</b> field is required.'));
        $this->validatorSchema['last_name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>last name</b> field is required.'));
        $this->validatorSchema['email_address'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>email address</b> field is required.'));
        $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false));
        $this->validatorSchema['username'] = new sfValidatorString(array('max_length' => 128, 'required' => true), array('required' => 'The <b>username</b> field is required.'));
        $this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 128, 'required' => $this->getObject()->isNew()), array('required' => 'The <b>password</b> field is required.'));
        $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
        $this->validatorSchema['password_again']->setMessage('required', 'The <b>confirm password</b> field is required.');
        $this->validatorSchema['is_active'] = new sfValidatorBoolean(array('required' => false));
        $this->validatorSchema['permissions_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false));
        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));

        $user = $this->getObject()->getUser() ? sfGuardUserTable::getInstance()->find($this->getObject()->getUser()->get('id')) : new sfGuardUser();

        $this->setDefaults(array(
            'username' => $user ? $user->get('username') : "",
            'first_name' => $user ? $user->get('first_name') : "",
            'last_name' => $user ? $user->get('last_name') : "",
            'email_address' => $user ? $user->get('email_address') : "",
            'is_active' => $user ? $user->get('is_active') : "",
            'password' => "",
            'password_again' => ""
        ));
    }

    public function formatDateFields()
    {
        $date_of_birth = !$this->getObject()->getId() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('date_of_birth')->format('d-m-Y');
        $this->getObject()->setDateOfBirth($date_of_birth);
    }

    /**
     * Override the save method to save the merged user form.
     */
    public function save($con = null)
    {
        $this->updateUser();
        return parent::save($con);
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
                $user->set('password', $this->getValue("password"));
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

    /**
     * Returns the user object. If it does
     * not exist return a new instance.
     *
     * @return sfGuardUser
     */
    protected function getUser()
    {
        if (!$this->getObject()->getUser())
        {
            return new sfGuardUser();
        }

        return $this->getObject()->getUser();
    }

}
