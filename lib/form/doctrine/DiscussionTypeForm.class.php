<?php

/**
 * DiscussionType form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionTypeForm extends BaseDiscussionTypeForm
{
  public function configure() {
        unset(
                $this['created_at'], $this['updated_at']
        );
        
        $this->validatorSchema['name']->setMessage('required', 'The <b>Name</b> field is required.');
    }
}
