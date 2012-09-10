<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_id">
  <?php if ('id' == $sort[0]): ?>
    <?php echo link_to(__('Id', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Id', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_email">
  <?php if ('can_receive_email' == $sort[0]): ?>
    <?php echo link_to(__('I\'m sent a direct message', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_email&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('I\'m sent a direct message', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_email&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_reply">
  <?php if ('can_receive_reply' == $sort[0]): ?>
    <?php echo link_to(__('I\'m sent a reply or mentioned', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_reply&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('I\'m sent a reply or mentioned', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_reply&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_peer_activities">
  <?php if ('can_receive_peer_activities' == $sort[0]): ?>
    <?php echo link_to(__('There\'s any new peer activities', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_peer_activities&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('There\'s any new peer activities', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_peer_activities&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_news_alerts">
  <?php if ('can_receive_news_alerts' == $sort[0]): ?>
    <?php echo link_to(__('There\'s any news alerts', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_news_alerts&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('There\'s any news alerts', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_news_alerts&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_announcement_alerts">
  <?php if ('can_receive_announcement_alerts' == $sort[0]): ?>
    <?php echo link_to(__('There\'s any announcement alerts', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_announcement_alerts&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('There\'s any announcement alerts', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_announcement_alerts&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_event_alerts">
  <?php if ('can_receive_event_alerts' == $sort[0]): ?>
    <?php echo link_to(__('There\'s any event alerts', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_event_alerts&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('There\'s any event alerts', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_event_alerts&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_discussion_updates">
  <?php if ('can_receive_discussion_updates' == $sort[0]): ?>
    <?php echo link_to(__('My discussions or topics are updated', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_discussion_updates&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('My discussions or topics are updated', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_discussion_updates&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_course_updates">
  <?php if ('can_receive_course_updates' == $sort[0]): ?>
    <?php echo link_to(__('There\'s any course material changes/uploads', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_course_updates&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('There\'s any course material changes/uploads', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_course_updates&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_assignment_due">
  <?php if ('can_receive_assignment_due' == $sort[0]): ?>
    <?php echo link_to(__('Assignments are due for submissions', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_assignment_due&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Assignments are due for submissions', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_assignment_due&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_system_updates">
  <?php if ('can_receive_system_updates' == $sort[0]): ?>
    <?php echo link_to(__('New changes have been applied to the TutorPlus system', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_system_updates&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('New changes have been applied to the TutorPlus system', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_system_updates&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_can_receive_system_maintenance">
  <?php if ('can_receive_system_maintenance' == $sort[0]): ?>
    <?php echo link_to(__('System is going to be down for maintenance purposes', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_system_maintenance&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('System is going to be down for maintenance purposes', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=can_receive_system_maintenance&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_user_id">
  <?php if ('user_id' == $sort[0]): ?>
    <?php echo link_to(__('User', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=user_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('User', array(), 'messages'), '@notification_settings', array('query_string' => 'sort=user_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>