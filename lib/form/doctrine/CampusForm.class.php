<?php

/**
 * Campus form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CampusForm extends BaseCampusForm
{
  public function configure()
  {
  	unset(
      $this['courses_list']
    );
  }
}
