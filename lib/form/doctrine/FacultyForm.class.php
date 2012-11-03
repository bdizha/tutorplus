<?php

/**
 * Faculty form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FacultyForm extends BaseFacultyForm
{
  public function configure()
  {
  	$this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Name</b> field is required.', 'max_length' => 'Only 255 chars are permittied.'));
  	$this->validatorSchema['abbreviation'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Abbreviation</b> field is required.', 'max_length' => 'Only 255 chars are permittied.'));
  }
}
