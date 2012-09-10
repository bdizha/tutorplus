<?php

/**
 * Project form base class.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {
  	$this->widgetSchema->setFormFormatterName('Normal');
  }
  
  /**
   * Set a cleaned value to a field name.
   *
   * @param string  $field The name of the value required
   * @param string  $value The cleaned value
   */  
  public function setValue($field, $value)
  {
    $this->values[$field] = $value;
  }
}