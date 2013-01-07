<?php

/**
 * NotificationSettings form.
 *
 * @package    tutorplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NotificationSettingsForm extends BaseNotificationSettingsForm
{
  public function configure()
  {
      $this->widgetSchema['profile_id'] = new sfWidgetFormInputHidden();
  }
}
