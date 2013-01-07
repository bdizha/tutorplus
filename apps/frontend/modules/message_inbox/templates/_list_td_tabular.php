<?php use_helper('Escaping') ?>
<td class="sf_admin_text sf_admin_list_td_from_emails<?php echo!$email_message->getIsRead() ? ' read' : '' ?>" subject="<?php echo esc_js_no_entities(myToolkit::shortenString($email_message->getSubject()), 255) ?>" id="email_<?php echo $email_message->getPrimaryKey() ?>" title="Read" alt="Read">
    <?php $recipientsCounter = 0; ?>
    <?php $users = sfGuardUserTable::getInstance()->retrieveByEmails($email_message->getToEmail()); ?>
    <?php foreach ($users as $user): ?>
        <?php $recipientsCounter++; ?>
        <?php include_partial('personal_info/photo', array('profile' => $user, "dimension" => 24)) ?>
        <?php if ($recipientsCounter == 4): ?>
            <?php echo (count($users) > 4) ? " ..." : ""; ?>
            <?php break; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</td>
<td class="sf_admin_text sf_admin_list_td_subject<?php echo!$email_message->getIsRead() ? ' read' : '' ?>" subject="<?php echo esc_js_no_entities($email_message->getSubject()) ?>" id="subject_<?php echo $email_message->getPrimaryKey() ?>" title="Read" alt="Read">
    <?php echo $email_message->getSubject() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at<?php echo!@$email_message->getIsRead() ? ' read' : '' ?>" subject="<?php echo esc_js_no_entities($email_message->getSubject()) ?>" id="date_<?php echo $email_message->getPrimaryKey() ?>" title="Read" alt="Read">
    <?php echo myToolkit::dateInWords($email_message->getCreatedAt()); ?>
</td>