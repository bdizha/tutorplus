<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_user">
  <?php echo __('Announcer', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_subject">
  <?php if ('subject' == $sort[0]): ?>
    <?php echo link_to(__('Subject', array(), 'messages'), '@announcement', array('query_string' => 'sort=subject&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.($sort[1] == 'asc' ? 'desc' : 'asc').'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Subject', array(), 'messages'), '@announcement', array('query_string' => 'sort=subject&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>