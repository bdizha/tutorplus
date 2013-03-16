<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->studentsBreadcrumbs()) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
	<div class="content-block">
		<?php include_partial('tpCommon/tabs', $helper->getTabs("students", $studentPeers, $instructorPeers, $suggestedPeers, $requestingPeers, $invitedPeers)) ?>
		<div class="tab-block">
			<?php if ($studentPeers->count() == 0): ?>
			<div>You don't have any student peers yet.</div>
			<?php include_partial('tpCommon/actions', $helper->findPeers()) ?>
			<?php else: ?>
			<?php include_partial('list', array("peers" => $studentPeers)) ?>
			<?php endif; ?>
		</div>
	</div>
</div>