<?php

/**
 * notification_settings module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage notification_settings
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNotification_settingsGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array(  '_save' =>   array(  ),);
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%id%% - %%can_receive_email%% - %%can_receive_reply%% - %%can_receive_peer_activities%% - %%can_receive_news_alerts%% - %%can_receive_announcement_alerts%% - %%can_receive_event_alerts%% - %%can_receive_discussion_updates%% - %%can_receive_course_updates%% - %%can_receive_assignment_due%% - %%can_receive_system_updates%% - %%can_receive_system_maintenance%% - %%user_id%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Notification Settings';
  }

  public function getEditTitle()
  {
    return 'Edit Notification Settings';
  }

  public function getNewTitle()
  {
    return 'New Notification settings';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array(  'Messages - Receive notification when:' =>   array(    0 => 'can_receive_email',    1 => 'can_receive_reply',  ),  'Alerts - Receive notification when:' =>   array(    0 => 'can_receive_news_alerts',    1 => 'can_receive_announcement_alerts',    2 => 'can_receive_event_alerts',  ),  'Activities - Receive notification when:' =>   array(    0 => 'can_receive_peer_activities',    1 => 'can_receive_discussion_updates',    2 => 'can_receive_course_updates',    3 => 'can_receive_assignment_due',  ),  'Updates - Receive notification when:' =>   array(    0 => 'can_receive_system_updates',    1 => 'can_receive_system_maintenance',  ),);
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'id',  1 => 'can_receive_email',  2 => 'can_receive_reply',  3 => 'can_receive_peer_activities',  4 => 'can_receive_news_alerts',  5 => 'can_receive_announcement_alerts',  6 => 'can_receive_event_alerts',  7 => 'can_receive_discussion_updates',  8 => 'can_receive_course_updates',  9 => 'can_receive_assignment_due',  10 => 'can_receive_system_updates',  11 => 'can_receive_system_maintenance',  12 => 'user_id',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'can_receive_email' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'I\'m sent a direct message',),
      'can_receive_reply' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'I\'m sent a reply or mentioned',),
      'can_receive_peer_activities' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'There\'s any new peer activities',),
      'can_receive_news_alerts' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'There\'s any news alerts',),
      'can_receive_announcement_alerts' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'There\'s any announcement alerts',),
      'can_receive_event_alerts' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'There\'s any event alerts',),
      'can_receive_discussion_updates' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'My discussions or topics are updated',),
      'can_receive_course_updates' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'There\'s any course material changes/uploads',),
      'can_receive_assignment_due' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Assignments are due for submissions',),
      'can_receive_system_updates' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'New changes have been applied to the TutorPlus system',),
      'can_receive_system_maintenance' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'System is going to be down for maintenance purposes',),
      'user_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'can_receive_request' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'I\'m followed by someone new',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'can_receive_email' => array(),
      'can_receive_reply' => array(),
      'can_receive_peer_activities' => array(),
      'can_receive_news_alerts' => array(),
      'can_receive_announcement_alerts' => array(),
      'can_receive_event_alerts' => array(),
      'can_receive_discussion_updates' => array(),
      'can_receive_course_updates' => array(),
      'can_receive_assignment_due' => array(),
      'can_receive_system_updates' => array(),
      'can_receive_system_maintenance' => array(),
      'user_id' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'can_receive_email' => array(),
      'can_receive_reply' => array(),
      'can_receive_peer_activities' => array(),
      'can_receive_news_alerts' => array(),
      'can_receive_announcement_alerts' => array(),
      'can_receive_event_alerts' => array(),
      'can_receive_discussion_updates' => array(),
      'can_receive_course_updates' => array(),
      'can_receive_assignment_due' => array(),
      'can_receive_system_updates' => array(),
      'can_receive_system_maintenance' => array(),
      'user_id' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'can_receive_email' => array(),
      'can_receive_reply' => array(),
      'can_receive_peer_activities' => array(),
      'can_receive_news_alerts' => array(),
      'can_receive_announcement_alerts' => array(),
      'can_receive_event_alerts' => array(),
      'can_receive_discussion_updates' => array(),
      'can_receive_course_updates' => array(),
      'can_receive_assignment_due' => array(),
      'can_receive_system_updates' => array(),
      'can_receive_system_maintenance' => array(),
      'user_id' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'can_receive_email' => array(),
      'can_receive_reply' => array(),
      'can_receive_peer_activities' => array(),
      'can_receive_news_alerts' => array(),
      'can_receive_announcement_alerts' => array(),
      'can_receive_event_alerts' => array(),
      'can_receive_discussion_updates' => array(),
      'can_receive_course_updates' => array(),
      'can_receive_assignment_due' => array(),
      'can_receive_system_updates' => array(),
      'can_receive_system_maintenance' => array(),
      'user_id' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'can_receive_email' => array(),
      'can_receive_reply' => array(),
      'can_receive_peer_activities' => array(),
      'can_receive_news_alerts' => array(),
      'can_receive_announcement_alerts' => array(),
      'can_receive_event_alerts' => array(),
      'can_receive_discussion_updates' => array(),
      'can_receive_course_updates' => array(),
      'can_receive_assignment_due' => array(),
      'can_receive_system_updates' => array(),
      'can_receive_system_maintenance' => array(),
      'user_id' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'NotificationSettingsForm';
  }

  public function hasFilterForm()
  {
    return false;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'NotificationSettingsFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 10;
  }

  public function getDefaultSort()
  {
    return array('can_receive_email', 'asc');
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
