<?php

/**
 * ProfileAcademicInfo form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileInfoForm extends BaseProfileForm {

  public function setup() {
    parent::setup();
    $this->useFields(array('high_school', 'studied_at', 'current_study', 'institution_id'));

    $this->validatorSchema['high_school'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>The High school</b> field is required.'));
    $this->validatorSchema['institution_id'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>Institution</b> field is required.'));
    $this->widgetSchema->setNameFormat('profile_info[%s]');
  }

}