<?php use_helper('I18N', 'Date') ?>
<?php $emailMessage = Doctrine_Core::getTable('EmailMessage')->find($activityFeed->getItemId()) ?>
<?php if ($emailMessage): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('personal_info/photo', array('profile' => $emailMessage->getSender(), "dimension" => 24)) ?>
            You have received an email from <?php echo link_to($emailMessage->getSender(), 'profile_show', $emailMessage->getSender()) ?> : 
            <?php echo link_to($emailMessage->getSubject(), 'message_inbox') ?>    
            <span class="datetime"><?php echo myToolkit::dateInWords($activityFeed->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>