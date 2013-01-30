<?php

/**
 * ProfileBiography form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileBiographyForm extends BaseProfileForm {

  public function setup() {
    parent::setup();
    $this->useFields(array('about_me'));

    $this->validatorSchema['about_me'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>About me</b> field is required.'));
    $this->widgetSchema->setNameFormat('profile_biography[%s]');
  }

}