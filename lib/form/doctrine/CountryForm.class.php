<?php

/**
 * Country form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CountryForm extends BaseCountryForm
{

    public function configure()
    {
        $this->validatorSchema['name']->setMessage('required', 'The <b>name</b> field is required.');
        $this->validatorSchema['code']->setMessage('required', 'The <b>code</b> field is required.');
    }

}
