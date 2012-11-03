<?php

require_once dirname(__FILE__) . '/../lib/notification_settingsGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/notification_settingsGeneratorHelper.class.php';

/**
 * notification_settings actions.
 *
 * @package    tutorplus
 * @subpackage notification_settings
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class notification_settingsActions extends autoNotification_settingsActions
{

    function executeIndex(sfWebRequest $request)
    {
        $notificationSettings = NotificationSettingsTable::getInstance()->findOrCreateOneByUserId($this->getUser()->getId());
        if ($notificationSettings)
        {
            $this->redirect('@notification_settings_edit?id=' . $notificationSettings->getId());
        }
    }

}
