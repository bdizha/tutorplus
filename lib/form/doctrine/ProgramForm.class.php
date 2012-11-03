<?php

/**
 * Program form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProgramForm extends BaseProgramForm
{
  public function configure()
  {
  	$this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>name</b> field is required.'));
  	$this->validatorSchema['abbreviation'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>abbreviation</b> field is required.'));
  	$this->validatorSchema['description'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>description</b> field is required.'));
  	$this->validatorSchema['code'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>code</b> field is required.'));
  }
}
