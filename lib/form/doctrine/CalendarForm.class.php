<?php

/**
 * Calendar form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CalendarForm extends BaseCalendarForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
                'choices' => CalendarTable::getInstance()->getTypes(),
            ));

        $this->validatorSchema['name']->setMessage('required', 'The <b>Name</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');
        $this->validatorSchema['color']->setMessage('required', 'The <b>Color</b> field is required.');
    }

    /**
     * Override the save method to save the calendar owner.
     */
    public function save($con = null)
    {
        if ($this->getObject()->isNew())
        {
            $user_id = sfContext::getInstance()->getUser()->getId();
            $is_new_calendar = true;
        }

        $calendar = parent::save($con);
        if (isset($is_new_calendar))
        {
            // save the user calendar record
            $this->saveUserCalendar($user_id, $calendar);
        }

        // return the saved calendar
        return $calendar;
    }

    // save the calendar owner.
    public function saveUserCalendar($user_id, $calendar)
    {
        $user_calendar = new UserCalendar();
        $user_calendar->setOwnerId($user_id);
        $user_calendar->setCalendar($calendar);
        $user_calendar->save();
    }
}
