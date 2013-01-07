<?php

/**
 * ProfilePublication form.
 *
 * @package    tutorplus.org
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfilePublicationForm extends BaseProfilePublicationForm {

    public function configure() {
        $profileId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['link']    = new sfWidgetFormInputText();

        $this->validatorSchema['link'] = new sfValidatorUrl(array('max_length' => 500, 'required' => false));
        $this->validatorSchema['title']->setMessage('required', 'The <b>Title</b> field is required.');
        $this->validatorSchema['link']->setMessage('invalid', 'The <b>Link</b> should be in right foramt (e.g http://something.something).');

        $this->setDefaults(array(
            'profile_id' => $profileId
        ));
    }

}
