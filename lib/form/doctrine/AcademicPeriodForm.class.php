<?php

/**
 * AcademicPeriod form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AcademicPeriodForm extends BaseAcademicPeriodForm
{
  public function configure()
  {
  	$this->formatDateFields();  	
  	$this->widgetSchema['start_date'] 	= new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
  	$this->widgetSchema['end_date'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
  	$this->widgetSchema['grades_due'] = new sfWidgetFormJQueryDate(array("change_month" => true, "change_year" => true));
    
    $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>name</b> field is required.'));    
    $this->validatorSchema['max_credits'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>max credits</b> field is required.'));
  }
  
  public function formatDateFields()
  {
  	$start_date = !$this->getObject()->getId() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('start_date')->format('d-m-Y');
  	$end_date = !$this->getObject()->getId() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('end_date')->format('d-m-Y');
  	$grades_due = !$this->getObject()->getId() ? date("d-m-Y", strtotime("now")) : $this->getObject()->getDateTimeObject('grades_due')->format('d-m-Y');
  	$this->getObject()->setStartDate($start_date)->setEndDate($end_date)->setGradesDue($grades_due);
  }
}
