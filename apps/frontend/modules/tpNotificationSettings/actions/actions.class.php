<?php

require_once dirname(__FILE__) . '/../lib/tpNotificationSettingsGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpNotificationSettingsGeneratorHelper.class.php';
/**
 * tpNotificationSettings actions.
 *
 * @package    tutorplus.org
 * @subpackage tpNotificationSettings
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpNotificationSettingsActions extends autoTpNotificationSettingsActions
{

    function executeIndex(sfWebRequest $request)
    {
        $notificationSettings = NotificationSettingsTable::getInstance()->findOrCreateOneByProfileId($this->getUser()->getId());
        if ($notificationSettings) {
            $this->redirect('@notification_settings_edit?id=' . $notificationSettings->getId());
        }
    }

}
