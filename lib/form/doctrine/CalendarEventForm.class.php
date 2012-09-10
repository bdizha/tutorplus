<?php

/**
 * CalendarEvent form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CalendarEventForm extends BaseCalendarEventForm
{

    public function configure()
    {
        $this->formatDateFields();

        unset(
            $this['created_at'], $this['updated_at']
        );

        $user_id = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['from_date'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
        $this->widgetSchema['to_date'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));

        $this->validatorSchema['name']->setMessage('required', 'The <b>title</b> field is required.');
        $this->validatorSchema['location']->setMessage('required', 'The <b>where</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>description</b> field is required.');

        $this->setDefaults(array(
            'user_id' => $user_id,
        ));
    }

    public function formatDateFields()
    {
        $from_date = !$this->getObject() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('from_date')->format('d-m-Y');
        $to_date = !$this->getObject() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('to_date')->format('d-m-Y');
        $this->getObject()->setFromDate($from_date)->setToDate($to_date);
    }

}
