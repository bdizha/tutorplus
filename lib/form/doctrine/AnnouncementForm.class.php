<?php

/**
 * Announcement form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnnouncementForm extends BaseAnnouncementForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $userId = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['lock_until'] = new tpWidgetFormDate();
        $this->widgetSchema['lock_after'] = new tpWidgetFormDate();
            
        $this->validatorSchema['subject']->setMessage('required', 'The <b>Subject</b> field is required.');
        $this->validatorSchema['message']->setMessage('required', 'The <b>Message</b> field is required.');
        $this->setDefaults(array(
            'user_id' => $userId,
        ));
    }
}
