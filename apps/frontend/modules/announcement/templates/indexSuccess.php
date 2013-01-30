<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div class="sf_admin_heading">
  <h3><?php echo __('Announcements', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_container">
  <div class="content-block">
    <div class="top-actions">
      <?php echo $helper->linkToAnnouncementNew() ?>
    </div>
    <div id="announcements">
      <?php include_partial('announcement/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    </div>  
  </div>
</div>
<script type='text/javascript'>
  $(document).ready(function() {
    $(".announcement").hover(function() {
      $(this).children(".inline-content-actions").show();
    },
    function() {
      $(this).children(".inline-content-actions").hide();
    });
  });
</script>