<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/breadcrumbs', $helper->findBreadcrumbs()) ?>
<?php include_component('common', 'secureMenu', $helper->allLinks()) ?>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
	<div class="content-block">
		<?php include_partial('common/tabs', $helper->getTabs("find", $studentPeers, $instructorPeers, $suggestedPeers, $requestingPeers, $invitedPeers)) ?>
		<div class="tab-block">
			<?php if ($potentialPeers->count() == 0): ?>
			<div>There isn't any potential peers available currently.</div>
			<?php include_partial('common/actions', $helper->findPeers()) ?>
			<?php else: ?>
			<?php include_partial('list', array("peers" => $potentialPeers, "isFinding" => true)) ?>
			<?php endif; ?>
		</div>
	</div>
</div>