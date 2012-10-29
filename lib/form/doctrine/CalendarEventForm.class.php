<?php

/**
 * CalendarEvent form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CalendarEventForm extends BaseCalendarEventForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );

        $user_id = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['from_date'] = new sfWidgetFormJQueryDate(array("min" => 0, "max" => 400000));
        $this->widgetSchema['to_date'] = new sfWidgetFormJQueryDate(array("min" => 0, "max" => 400000));

        $this->validatorSchema['name']->setMessage('required', 'The <b>Title</b> field is required.');
        $this->validatorSchema['location']->setMessage('required', 'The <b>Where</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');

        $this->setDefaults(array(
            'user_id' => $user_id,
        ));
    }

}
