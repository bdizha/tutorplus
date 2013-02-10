<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->geMyLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getMyBreadcrumbs()) ?>
<div class="sf_admin_heading">
	<h3>
		<?php echo __('Groups', array(), 'messages') ?>
	</h3>
</div>
<div id="sf_admin_content">
	<?php include_partial('common/flashes_normal') ?>
	<div class="content-block">
		<?php include_partial('common/tabs', array('tabs' => $helper->getTabs($myDiscussions, $exploreDiscussions, "my"))) ?>
		<div class="tab-block">
			<ul class="sf_admin_actions">
				<?php include_partial('discussion_group/list_actions', array('helper' => $helper)) ?>
			</ul>
			<?php include_partial('discussion_group/list', array('discussionGroups' => $myDiscussions, 'helper' => $helper)) ?>
			<ul class="sf_admin_actions">
				<?php include_partial('discussion_group/list_actions', array('helper' => $helper)) ?>
			</ul>
		</div>
	</div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){    
        $(".discussion_group").hover(function(){
            $(this).children(".inline-content-actions").show();
        },
        function(){
            $(this).children(".inline-content-actions").hide();
        });
    });
</script>
