<?php use_helper('I18N', 'Date') ?>
<?php if ($course): ?>
<?php include_component('common', 'secureMenu', $helper->getCourseLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getCourseBreadcrumbs()) ?>
<?php else: ?>
<?php include_component('common', 'secureMenu', $helper->getDiscussionGroupLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getDiscussionGroupBreadcrumbs()) ?>
<?php endif; ?>
<div class="sf_admin_heading">
	<h3>
		Group ~
		<?php echo $discussionGroup->getName() ?>
	</h3>
</div>
<div id="sf_admin_content">
	<?php include_partial('common/flashes_normal') ?>
	<div class="content-block">
		<?php include_partial('common/tabs', array('tabs' => $helper->getInviteTabs($discussionGroup, $myPeers))) ?>
		<div class="tab-block" id="my_peers">
			<div id="discussion_peer_invite_form_holder">
				<form id="discussion_peer_invite_form"
					action="<?php echo url_for('@discussion_peer_invite') ?>"
					method="post">
					<?php include_partial('common/form_actions') ?>
					<?php foreach ($myPeers as $peer): ?>
					<?php if ($peer->getInviteeId() == $sf_user->getId()): ?>
					<?php $profile = $peer->getInviter(); ?>
					<?php else: ?>
					<?php $profile = $peer->getInvitee(); ?>
					<?php endif; ?>
					<div class="peer">
						<input type="checkbox" class="input-checkbox" name="peers[]"
							value="<?php echo $profile["id"] ?>"
							<?php echo (is_array($discussionPeerIds) && in_array($profile["id"], $discussionPeerIds)) ? "checked='checked'" : "" ?>
							id="peers_<?php echo $profile["id"] ?>" />
						<div class="description">
							<?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 36)) ?>
							<div class="name">
								<?php echo $profile ?>
							</div>
							<div class="institution">
								<?php echo $profile->getInstitution() ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<?php include_partial('common/form_actions') ?>
				</form>
			</div>
		</div>
	</div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".cancel, .done").click(function(){
        	loadUrl('<?php echo url_for('@discussion_peer') ?>');
        });
    });
</script>
