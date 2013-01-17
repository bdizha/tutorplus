<?php

/**
 * InstructorEnroll form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InstructorEnrollForm extends ProfileForm {

  public function configure() {
    parent::configure();
    unset(
        $this['permissions_list']
    );

    $this->widgetSchema['is_instructor'] = new sfWidgetFormInputHidden();
    $this->setDefaults(array(
        'is_instructor' => 1
    ));
  }

}