<?php

/**
 * ProfileEnroll form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileEnrollForm extends ProfileForm {

  public function configure() {
    parent::configure();
    unset(
        $this['is_active'], $this['permissions_list']
    );
    
    $this->setDefault("is_instructor", null);
  }

}