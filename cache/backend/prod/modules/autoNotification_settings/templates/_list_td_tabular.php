<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($notification_settings->getId(), 'notification_settings_edit', $notification_settings) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_email">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceiveEmail())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_reply">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceiveReply())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_peer_activities">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceivePeerActivities())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_news_alerts">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceiveNewsAlerts())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_announcement_alerts">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceiveAnnouncementAlerts())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_event_alerts">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceiveEventAlerts())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_discussion_updates">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceiveDiscussionUpdates())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_course_updates">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceiveCourseUpdates())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_assignment_due">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceiveAssignmentDue())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_system_updates">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceiveSystemUpdates())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_can_receive_system_maintenance">
  <?php echo get_partial('notification_settings/list_field_boolean', array('value' => $notification_settings->getCanReceiveSystemMaintenance())) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_id">
  <?php echo $notification_settings->getUserId() ?>
</td>
