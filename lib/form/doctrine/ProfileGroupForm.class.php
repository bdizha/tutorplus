<?php

/**
 * ProfileGroup form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileGroupForm extends BaseProfileGroupForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $this->widgetSchema['permissions_list'] = new sfWidgetFormSelectCheckbox(array(
                    'choices' => ProfilePermissionTable::getInstance()->getChoices()
                ));

        $this->validatorSchema['permissions_list'] = new sfValidatorChoice(array(
                    'choices' => array_keys(ProfilePermissionTable::getInstance()->getChoices()),
                        )
        );

        $this->validatorSchema['name']->setMessage('required', 'The <b>Name</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');
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

        $existing = $this->object->Permissions->getPrimaryKeys();
        $values = $this->getValue('permissions_list');
        if (!is_array($values)) {
            $values = array();
        }

        $unlink = array_diff($existing, $values);
        if (count($unlink)) {
            $this->object->unlink('Permissions', array_values($unlink));
        }

        $link = array_diff($values, $existing);

        if (count($link)) {
            foreach (array_values($link) as $permissionId) {
                $profileGroupPermission = new ProfileGroupPermission();
                $profileGroupPermission->setGroupId($this->object->getId());
                $profileGroupPermission->setPermissionId($permissionId);
                $profileGroupPermission->save();
            }
        }
    }

}
