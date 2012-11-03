<?php

/**
 * AcademicYear form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AcademicYearForm extends BaseAcademicYearForm
{
  public function configure()
  {
  	$this->validatorSchema['year_start'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>year start</b> field is required.'));
  	$this->validatorSchema['year_end'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>year end</b> field is required.'));
  }
}
