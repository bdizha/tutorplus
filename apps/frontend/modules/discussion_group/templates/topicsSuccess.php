<?php use_helper('I18N', 'Date') ?>
<?php if (is_object($course) && $course->getId()): ?>
<?php include_partial('common/breadcrumbs', $helper->getCourseBreadcrumbs($discussionGroup)) ?>
<?php else: ?>
<?php include_partial('common/breadcrumbs', $helper->getShowBreadcrumbs($discussionGroup)) ?>
<?php endif; ?>
<?php include_component('common', 'secureMenu', $helper->getShowLinks()) ?>
<div class="sf_admin_heading">
	<h3>
		Group ~
		<?php echo $discussionGroup->getName() ?>
	</h3>
</div>
<div id="sf_admin_content">
	<?php include_partial('common/flashes_normal') ?>
	<div class="content-block">
		<?php include_partial('common/tabs', array('tabs' => $helper->getShowTabs($discussionGroup, "topics"))) ?>
		<div class="tab-block" id="my_peers">
			<?php include_partial('common/actions', array('actions' => $helper->getShowActions($discussionGroup, $discussionPeer, $discussionGroup->hasProfile($sf_user->getId())))) ?>
			<?php include_partial('discussion_topic/list', array('discussionTopics' => $discussionGroup->getTopics(), 'helper' => $helper)) ?>
		</div>
	</div>
</div>