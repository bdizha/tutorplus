<?php

/**
 * contact form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactForm extends BasecontactForm
{
  public function configure()
  {
    unset(
        $this['created_at'],
        $this['updated_at']
    );
  }
}
