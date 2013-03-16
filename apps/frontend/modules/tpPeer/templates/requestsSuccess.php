<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->suggestedBreadcrumbs()) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
	<div class="content-block">
		<?php include_partial('tpCommon/tabs', $helper->getTabs("requests", $studentPeers, $instructorPeers, $suggestedPeers, $requestingPeers, $invitedPeers)) ?>
		<div class="tab-block">
			<?php if ($requestingPeers->count() == 0): ?>
			<div>There isn't any peer requests currently.</div>
			<?php include_partial('tpCommon/actions', $helper->findPeers()) ?>
			<?php else: ?>
			<?php include_partial('list', array("peers" => $requestingPeers)) ?>
			<?php endif; ?>
		</div>
	</div>
</div>
