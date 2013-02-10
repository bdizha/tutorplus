<?php use_helper('I18N', 'Date') ?>
<?php $emailMessage = Doctrine_Core::getTable('EmailMessage')->find($activityFeed->getItemId()) ?>
<?php if ($emailMessage): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('personal_info/photo', array('profile' => $emailMessage->getInvoker(), "dimension" => 24)) ?>
            You have sent <?php echo link_to($emailMessage->getInvoker(), 'profile_show', $emailMessage->getInvoker()) ?> a message: 
            <?php echo link_to($emailMessage->getSubject(), 'message_inbox') ?>    
            <span class="datetime"><?php echo myToolkit::dateInWords($activityFeed->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>