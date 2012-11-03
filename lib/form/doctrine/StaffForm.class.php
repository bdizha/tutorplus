<?php

/**
 * Staff form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StaffForm extends BaseStaffForm
{
  protected function setupInheritance() {
        parent::setupInheritance();

        $this->widgetSchema->setNameFormat('staff[%s]');

        $this->widgetSchema['employment_start_date'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
        $this->widgetSchema['employment_end_date'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
        $this->widgetSchema['is_active'] = new sfWidgetFormInputCheckbox();
        $this->widgetSchema['is_student'] = new sfWidgetFormInputCheckbox();

        $this->validatorSchema['is_active'] = new sfValidatorBoolean(array('required' => false));
        $this->validatorSchema['employment']->setMessage('required', 'The <b>Employment</b> field is required.');
    }
}
