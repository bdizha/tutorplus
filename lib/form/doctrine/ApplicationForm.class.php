<?php

/**
 * Application form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ApplicationForm extends BaseApplicationForm
{
  public function configure()
  {
  	unset(
      $this['created_at'],
      $this['updated_at']
    );
    
    $this->widgetSchema['gender'] = new sfWidgetFormChoice(array('choices' => array('male' => 'male', 'female' => 'female'), "expanded" => true));
    $this->widgetSchema['address_line_one'] = new sfWidgetFormInputText();
    $this->widgetSchema['address_line_two'] = new sfWidgetFormInputText();
    $this->widgetSchema['city'] = new sfWidgetFormInputText();
  }
}
