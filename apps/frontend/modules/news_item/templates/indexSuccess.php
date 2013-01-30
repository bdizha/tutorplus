<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div class="sf_admin_heading">
  <h3><?php echo __('News Items', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_container">
  <div class="content-block">
    <div class="top-actions">
      <?php echo $helper->linkToNewsItemNew() ?>
    </div>
    <div id="news_items">
      <?php include_partial('news_item/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    </div> 
  </div>
</div>
<script type='text/javascript'>
  $(document).ready(function(){
    $(".news-item").hover(
        function(){
          $(this).children(".inline-content-actions").show();
        },
        function(){
          $(this).children(".inline-content-actions").hide();
        });
  });
</script>