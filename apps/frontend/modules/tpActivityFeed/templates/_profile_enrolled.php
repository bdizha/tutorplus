<?php use_helper('I18N', 'Date') ?>
<?php $profile = Doctrine_Core::getTable('Profile')->find($activityFeed->getItemId()) ?>
<?php if ($profile): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('tpPersonalInfo/photo', array('profile' => $profile, "dimension" => 24)) ?>
            You've successfully enrolled into TutorPlus!
            <span class="datetime"><?php echo myToolkit::dateInWords($activityFeed->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>