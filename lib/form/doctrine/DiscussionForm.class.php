<?php

/**
 * DiscussionGroup form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionGroupForm extends BaseDiscussionGroupForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $profileId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['last_visit'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['access_level'] = new sfWidgetFormChoice(array(
                    'choices' => DiscussionGroupTable::getInstance()->getAccessLevels(),
                    "expanded" => true, "multiple" => false
                ));

        $this->validatorSchema['access_level'] = new sfValidatorChoice(array(
                    'choices' => array_keys(DiscussionGroupTable::getInstance()->getAccessLevels()),
                ));

        $this->validatorSchema['name']->setMessage('required', 'The <b>Name</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');

        $this->setDefaults(array(
            'profile_id' => $profileId,
            'access_level' => DiscussionGroupTable::ACCESS_LEVEL_RESTRICTED,
        ));
    }
}