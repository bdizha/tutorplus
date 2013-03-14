<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div class="sf_admin_heading">
	<h3>
		<?php echo __('News Items', array(), 'messages') ?>
	</h3>
</div>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
	<div class="content-block">
		<?php include_partial('common/tabs', array('tabs' => $helper->getTabs($announcements, $newsItems, "index"))) ?>
		<div class="tab-block">
			<ul class="sf_admin_actions">
				<?php include_partial('news_item/list_actions', array('helper' => $helper)) ?>
			</ul>
			<?php include_partial('news_item/list', array('newsItems' => $newsItems, 'helper' => $helper)) ?>
			<ul class="sf_admin_actions">
				<?php include_partial('news_item/list_actions', array('helper' => $helper)) ?>
			</ul>
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
