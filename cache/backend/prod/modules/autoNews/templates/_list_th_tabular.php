<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_heading">
  <?php if ('heading' == $sort[0]): ?>
    <?php echo link_to(__('Heading', array(), 'messages'), '@news', array('query_string' => 'sort=heading&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.($sort[1] == 'asc' ? 'desc' : 'asc').'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Heading', array(), 'messages'), '@news', array('query_string' => 'sort=heading&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_blurb">
  <?php if ('blurb' == $sort[0]): ?>
    <?php echo link_to(__('Blurb', array(), 'messages'), '@news', array('query_string' => 'sort=blurb&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.($sort[1] == 'asc' ? 'desc' : 'asc').'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Blurb', array(), 'messages'), '@news', array('query_string' => 'sort=blurb&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_is_published">
  <?php if ('is_published' == $sort[0]): ?>
    <?php echo link_to(__('Is published', array(), 'messages'), '@news', array('query_string' => 'sort=is_published&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.($sort[1] == 'asc' ? 'desc' : 'asc').'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Is published', array(), 'messages'), '@news', array('query_string' => 'sort=is_published&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>