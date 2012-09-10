<?php use_helper('Escaping') ?>
<td class="sf_admin_text sf_admin_list_td_from_emails<?php echo !$email_message->getIsRead() ? ' read' : '' ?>" subject="<?php echo esc_js_no_entities($email_message->getSubject()) ?>" id="email_<?php echo $email_message->getPrimaryKey() ?>" title="Read" alt="Read">
    <?php echo $email_message->getFromEmails() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_subject<?php echo !$email_message->getIsRead() ? ' read' : '' ?>" subject="<?php echo esc_js_no_entities($email_message->getSubject()) ?>" id="subject_<?php echo $email_message->getPrimaryKey() ?>" title="Read" alt="Read">
    <?php echo $email_message->getSubject() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at<?php echo !@$email_message->getIsRead() ? ' read' : '' ?>" subject="<?php echo esc_js_no_entities($email_message->getSubject()) ?>" id="date_<?php echo $email_message->getPrimaryKey() ?>" title="Read" alt="Read">
    <?php echo false !== strtotime($email_message->getCreatedAt()) ? format_date($email_message->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>