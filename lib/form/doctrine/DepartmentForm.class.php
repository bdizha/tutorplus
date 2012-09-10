<?php

/**
 * Department form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DepartmentForm extends BaseDepartmentForm
{
	public function configure()
  {
  	$this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>name</b> field is required.'));
  	$this->validatorSchema['abbreviation'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>abbreviation</b> field is required.'));
  }
}