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

        $user_id = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true), array('required' => 'The <b>name</b> field is required.'));

        $this->setDefaults(array(
            'user_id' => $user_id,
        ));
    }

}
