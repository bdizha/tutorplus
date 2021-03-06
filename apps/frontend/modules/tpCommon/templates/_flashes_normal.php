<?php slot('notice') ?>
<?php if ($sf_user->hasFlash('notice')): ?>
<div class="normal-notice">
	<?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?>
</div>
<?php endif; ?>
<script type='text/javascript'>
$(document).ready(function(){
	setTimeout(function(){
		$(".normal-notice").slideUp("slow");
    }, 5000);
});
</script>
<?php end_slot() ?>
<?php if ($sf_user->hasFlash('error')): ?>
<div class="error">
	<?php if (isset($form)): ?>
	<div class="title">Please correct the following encountered errors.</div>
	<ol>
		<?php foreach ($form as $name => $field): ?>
		<?php if ($field->hasError()): ?>
		<?php echo '<li>' . $field->getError() . '</li>' ?>
		<?php endif; ?>
		<?php endforeach; ?>
		<?php if ($form->hasGlobalErrors()): ?>
		<?php foreach ($form->getGlobalErrors() as $error): ?>
		<?php echo '<li>' . $error . '</li>' ?>
		<?php endforeach; ?>
		<?php endif; ?>
	</ol>
	<?php else: ?>
	<?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?>
	<?php endif; ?>
</div>
<?php endif; ?>