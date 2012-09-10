<?php

/**
 * BulletinBoard form.
 *
 * @package    ecollegeplus
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

        $user_id = sfContext::getInstance()->getUser()->getId();
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array("default" => $user_id));

        $this->validatorSchema['post']->setMessage('required', 'The <b>Post</b> field is required.');

        $this->disableLocalCSRFProtection();
    }
    
    // save the calendar owner.
    public function saveUserCalendar($user_id, $calendar)
    {
        $user_calendar = new UserCalendar();
        $user_calendar->setOwnerId($user_id);
        $user_calendar->setCalendar($calendar);
        $user_calendar->save();
    }

}
