<?php

/**
 * ProfileDetails form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileDetailsForm extends BaseProfileForm {

  public function setup() {
    parent::setup();
    $this->useFields(array('title', 'first_name', 'middle_name', 'last_name', 'gender', 'birth_date'));
    
    $this->widgetSchema['birth_date'] = new tpWidgetFormDate();

    $this->validatorSchema['title'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Title</b> field is required.'));
    $this->validatorSchema['first_name']->setMessage('required', 'The <b>First name</b> field is required.');
    $this->validatorSchema['last_name']->setMessage('required', 'The <b>First name</b> field is required.');
    $this->validatorSchema['gender']->setMessage('required', 'The <b>Gender</b> field is required.');
    $this->validatorSchema['birth_date']->setMessage('required', 'The <b>Birth date</b> field is required.');
    $this->widgetSchema->setNameFormat('profile_details[%s]');
  }

}