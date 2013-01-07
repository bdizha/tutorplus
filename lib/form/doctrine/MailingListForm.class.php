<?php

/**
 * MailingList form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MailingListForm extends BaseMailingListForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $profile_id = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
        $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>name</b> field is required.'));

        $this->setDefaults(array(
            'profile_id' => $profile_id,
        ));
    }

}
