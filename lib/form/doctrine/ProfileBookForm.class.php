<?php

/**
 * ProfileBook form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileBookForm extends BaseProfileBookForm {

    public function configure() {
        $profileId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();

        $this->validatorSchema['title']->setMessage('required', 'The <b>Title</b> field is required.');
        $this->validatorSchema['author']->setMessage('required', 'The <b>Author</b> field is required.');
        $this->validatorSchema['title']->setMessage('max_length', 'Please specify the max length message here.');
        $this->validatorSchema['author']->setMessage('max_length', 'Please specify the max length message here.');

        $this->setDefaults(array(
            'profile_id' => $profileId
        ));
    }

}
