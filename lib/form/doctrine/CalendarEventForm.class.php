<?php

/**
 * CalendarEvent form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CalendarEventForm extends BaseCalendarEventForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $profileId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['from_date'] = new tpWidgetFormDate();
        $this->widgetSchema['to_date'] = new tpWidgetFormDate();
        
        $this->validatorSchema['from_date']->setMessage('required', 'The <b>From</b> field is required.');
        $this->validatorSchema['to_date']->setMessage('required', 'The <b>To</b> field is required.');
        $this->validatorSchema['from_date']->setMessage('invalid', 'The <b>From</b> field is invalid.');
        $this->validatorSchema['to_date']->setMessage('invalid', 'The <b>To</b> field is invalid.');
        $this->validatorSchema['name']->setMessage('required', 'The <b>Title</b> field is required.');
        $this->validatorSchema['location']->setMessage('required', 'The <b>Where</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');

        $this->setDefaults(array(
            'profile_id' => $profileId,
        ));
    }

}
