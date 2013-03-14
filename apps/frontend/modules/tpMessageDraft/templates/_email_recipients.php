<?php if (!isset($students) || !isset($instructors) || !isset($mailingLists)): ?>
    <?php $students = StudentTable::getInstance()->findAll(); ?>
    <?php $instructors = InstructorTable::getInstance()->findAll(); ?>
    <?php $mailingLists = MailingListTable::getInstance()->findAll(); ?>
<?php endif; ?>

<?php $recipientEmails = "" ?>
<div id="recipients_holder_<?php echo $type ?>">
    <?php $recipient = $sf_user->getMyAttribute('email_message_recipients', array()); ?>
    <?php if (isset($recipient[$type]['student']) && is_array($recipient[$type]['student'])): ?>
        <?php foreach ($students as $student): ?>
            <?php if (in_array($student["id"], $recipient[$type]['student'])): ?>
                <?php include_partial('personal_info/photo', array('profile' => $student->getProfile(), "dimension" => 24)) ?>
                <?php $recipientEmails .= $student->getProfile()->getEmail() . ";" ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($recipient[$type]['instructor']) && is_array($recipient[$type]['instructor'])): ?>
        <?php foreach ($instructors as $instructor): ?>
            <?php if (in_array($instructor["id"], $recipient[$type]['instructor'])): ?>
                <?php include_partial('personal_info/photo', array('profile' => $instructor->getProfile(), "dimension" => 24)) ?>
                <?php $recipientEmails .= $instructor->getProfile()->getEmail() . ";" ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($recipient[$type]['mailing_list']) && is_array($recipient[$type]['mailing_list'])): ?>
        <?php foreach ($mailingLists as $mailingList): ?>
            <?php if (in_array($mailingList["id"], $recipient[$type]['mailing_list'])): ?>
                <?php include_partial('personal_info/photo', array('profile' => $mailingList->getProfile(), "dimension" => 24)) ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php
    if ((!isset($recipient[$type]['student']) || !is_array($recipient[$type]['student'])) &&
            (!isset($recipient[$type]['instructor']) || !is_array($recipient[$type]['instructor'])) &&
            (!isset($recipient[$type]['mailing_list']) || !is_array($recipient[$type]['mailing_list']))):
        ?>
        No recipients added
    <?php endif; ?>    
</div>
<script type='text/javascript'>
    $(document).ready(function(){        
        // push the newly added recipients to the actual message fields
        $("#email_message_<?php echo $type ?>").val("<?php echo trim($recipientEmails, ";") ?>");
    });
</script>