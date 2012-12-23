<?php

/**
 * Profile form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $this->widgetSchema['first_name'] = new sfWidgetFormInputText();
        $this->widgetSchema['last_name'] = new sfWidgetFormInputText();
        $this->widgetSchema['date_of_birth'] = new tpWidgetFormDate();
        $this->widgetSchema['username'] = new sfWidgetFormInputText();
        $this->widgetSchema['email_address'] = new sfWidgetFormInputText();
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword(array(), array("autocomplete" => "off"));
        $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword(array(), array("autocomplete" => "off"));
        $this->widgetSchema['is_active'] = new sfWidgetFormInputCheckbox();
        $this->widgetSchema->moveField('password_again', 'after', 'password');

        $this->widgetSchema['permissions_list'] = new sfWidgetFormSelectCheckbox(array(
                    'choices' => ProfilePermissionTable::getInstance()->getChoices()
                ));

        $this->validatorSchema['permissions_list'] = new sfValidatorChoice(array(
                    'choices' => array_keys(ProfilePermissionTable::getInstance()->getChoices())
                        )
        );

        $this->validatorSchema['first_name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>First name</b> field is required.'));
        $this->validatorSchema['last_name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Last name</b> field is required.'));
        $this->validatorSchema['email_address'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Email address</b> field is required.'));
        $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false));
        $this->validatorSchema['username'] = new sfValidatorString(array('max_length' => 128, 'required' => true), array('required' => 'The <b>Username</b> field is required.'));
        $this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 128, 'required' => $this->getObject()->isNew()), array('required' => 'The <b>Password</b> field is required.'));
        $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
        $this->validatorSchema['password_again']->setMessage('required', 'The <b>Confirm password</b> field is required.');
        $this->validatorSchema['permissions_list']->setMessage('required', 'At least a <b>Permissions</b> choice must be selected (0 values selected).');
        $this->validatorSchema['is_active'] = new sfValidatorBoolean(array('required' => false));
        $this->validatorSchema['date_of_birth'] = new sfValidatorDateTime(array('required' => true), array('required' => 'The <b>Date of birth</b> field is required.', 'invalid' => 'The <b>Date of birth</b> field is invalid.'));
        $this->validatorSchema['about']->setMessage('max_length', 'Please specify the max length message here');
        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));

        $user = $this->getObject()->getUser() ? sfGuardUserTable::getInstance()->find($this->getObject()->getUser()->get('id')) : new sfGuardUser();

        $this->setDefaults(array(
            'username' => $user ? $user->get('username') : "",
            'first_name' => $user ? $user->get('first_name') : "",
            'last_name' => $user ? $user->get('last_name') : "",
            'email_address' => $user ? $user->get('email_address') : "",
            'is_active' => $user ? $user->get('is_active') : "",
            'password' => "",
            'password_again' => "",
            'permissions_list' => $user ? $user->Permissions->getPrimaryKeys() : array()
        ));
    }

    /**
     * Override the save method to save the merged user form.
     */
    public function save($con = null) {
        $this->updateUser();
        $this->savePermissionsList($con);
        return parent::save($con);
    }

    /**
     * Updates the user merged form
     */
    protected function updateUser() {
        if (!is_null($user = $this->getUser())) {
            if (!$user->getId()) {
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
    protected function getUser() {
        if (!$this->getObject()->getUser()) {
            return new sfGuardUser();
        }

        return $this->getObject()->getUser();
    }

    public function savePermissionsList($con = null) {

        if (!$this->isValid()) {
            throw $this->getErrorSchema();
        }

        if (!isset($this->widgetSchema['permissions_list'])) {
            // somebody has unset this widget
            return;
        }

        if (null === $con) {
            $con = $this->getConnection();
        }

        $user = $this->getUser();
        $existing = $user->Permissions->getPrimaryKeys();
        $values = $this->getValue('permissions_list');
        if (!is_array($values)) {
            $values = array();
        }

        $unlink = array_diff($existing, $values);
        if (count($unlink)) {
            $user->unlink('Permissions', array_values($unlink));
        }

        $link = array_diff($values, $existing);

        if (count($link)) {
            foreach (array_values($link) as $permissionId) {
                $profileUserPermission = new ProfileUserPermission();
                $profileUserPermission->setUserId($user->getId());
                $profileUserPermission->setPermissionId($permissionId);
                $profileUserPermission->save();
            }
        }
    }

}
