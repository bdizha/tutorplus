<?php

/**
 * NotificationSettingsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class NotificationSettingsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object NotificationSettingsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('NotificationSettings');
    }

    public function findOrCreateOneByUserId($userId)
    {
        if (!is_object($notificationSettings = $this->getInstance()->findOneByUserId($userId)))
        {
            $notificationSettings = new NotificationSettings();
            $notificationSettings->setUserId($userId);
            $notificationSettings->save();
        }
        return $notificationSettings;
    }
}