<?php if ($profile_type): ?>
    <?php include_partial('contact_'.$profile_type.'/contact_details', array("profile" => $profile)); ?>
<?php endif; ?>