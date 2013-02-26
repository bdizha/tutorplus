<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->allLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->suggestedBreadcrumbs()) ?>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
	<div class="content-block">
		<?php include_partial('common/tabs', $helper->getTabs("requests", $studentPeers, $instructorPeers, $suggestedPeers, $requestingPeers, $invitedPeers)) ?>
		<div class="tab-block">
			<?php if ($requestingPeers->count() == 0): ?>
			<div>There isn't any peer requests currently.</div>
			<?php include_partial('common/actions', $helper->findPeers()) ?>
			<?php else: ?>
			<?php include_partial('list', array("peers" => $requestingPeers)) ?>
			<?php endif; ?>
		</div>
	</div>
</div>
