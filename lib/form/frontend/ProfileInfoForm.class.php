<?php

/**
 * ProfileAcademicInfo form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileInfoForm extends ProfileForm {

  protected $includedFields = array(
      'title',
      'gender',
      'birth_date',
      'high_school',
      'studied_at',
      'current_study',
      'institution_id'
  );

  public function configure() {
    parent::configure();
    unset(
        $this['is_active'], $this['is_super_admin'], $this['is_instructor'], $this['password'], $this['password_confirmation']
    );

    $this->validatorSchema['high_school'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
    $this->validatorSchema['studied_at'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
    $this->validatorSchema['current_study'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
    $this->validatorSchema['title'] = new sfValidatorString(array('max_length' => 255, 'required' => true));

    $this->validatorSchema['title']->setMessage('required', 'The <b>Title</b> field is required.');
    $this->validatorSchema['first_name']->setMessage('required', 'The <b>First name</b> field is required.');
    $this->validatorSchema['last_name']->setMessage('required', 'The <b>First name</b> field is required.');
    $this->validatorSchema['gender']->setMessage('required', 'The <b>Gender</b> field is required.');
    $this->validatorSchema['birth_date']->setMessage('required', 'The <b>DOB</b> field is required.');
    $this->validatorSchema['high_school']->setMessage('required', 'The <b>High school</b> field is required.');
    $this->validatorSchema['studied_at']->setMessage('required', 'The <b>Studied at</b> field is required.');
    $this->validatorSchema['current_study']->setMessage('required', 'The <b>Current study</b> field is required.');

    $this->widgetSchema->setNameFormat('profile_info[%s]');

    foreach ($this as $name => $field) {
      if (!in_array($name, $this->includedFields)) {
        $this->widgetSchema[$name] = new sfWidgetFormInputHidden();
      }
    }

    foreach ($this as $name => $field) {
      if (!in_array($name, $this->includedFields)) {
        $this->validatorSchema[$name] = new sfValidatorString(array('required' => false));
      }
    }
  }

}