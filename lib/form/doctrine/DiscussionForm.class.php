<?php

/**
 * Discussion form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionForm extends BaseDiscussionForm {

    public function configure() {
        $this->formatDateFields();

        unset(
                $this['created_at'], $this['updated_at']
        );

        $user_id = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['last_visit'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['access_level'] = new sfWidgetFormChoice(array(
                    'choices' => DiscussionTable::getInstance()->getAccessLevels(),
                    "expanded" => true, "multiple" => false
                ));

        $this->validatorSchema['access_level'] = new sfValidatorChoice(array(
                    'choices' => array_keys(DiscussionTable::getInstance()->getAccessLevels()),
                ));

        $this->validatorSchema['name']->setMessage('required', 'The <b>Name</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');

        $this->setDefaults(array(
            'user_id' => $user_id,
            'access_level' => DiscussionTable::ACCESS_LEVEL_RESTRICTED,
        ));
    }

    public function formatDateFields() {
        $lastVisit = !$this->getObject() ? date("d-m-Y H:i:s", strtotime("now")) : $this->getObject()->getDateTimeObject('last_visit')->format('d-m-Y');
        $this->getObject()->setLastVisit($lastVisit);
    }

}