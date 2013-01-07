<?php

/**
 * BulletinBoard form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BulletinBoardForm extends BaseBulletinBoardForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $profile_id = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden(array("default" => $profile_id));

        $this->validatorSchema['post']->setMessage('required', 'The <b>Post</b> field is required.');

        $this->disableLocalCSRFProtection();
    }
    
    // save the calendar owner.
    public function saveUserCalendar($profile_id, $calendar)
    {
        $user_calendar = new UserCalendar();
        $user_calendar->setOwnerId($profile_id);
        $user_calendar->setCalendar($calendar);
        $user_calendar->save();
    }

}
