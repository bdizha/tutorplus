<?php

/**
 * ProfilePermission form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfilePermissionForm extends BaseProfilePermissionForm
{
  public function configure()
  {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $this->validatorSchema['name']->setMessage('required', 'The <b>Name</b> field is required.');
        $this->validatorSchema['description']->setMessage('required', 'The <b>Description</b> field is required.');
  }
}
