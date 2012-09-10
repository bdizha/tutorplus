<?php use_helper('Escaping') ?>
<td class="sf_admin_text sf_admin_list_td_to_email<?php echo !$email_message->getIsRead() ? ' read' : '' ?>" id="email_<?php echo $email_message->getPrimaryKey() ?>" subject="<?php echo esc_specialchars($email_message->getSubject()) ?>" title="Read" alt="Read">
  <?php echo $email_message->getToEmail() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_subject<?php echo !$email_message->getIsRead() ? ' read' : '' ?>" id="subject_<?php echo $email_message->getPrimaryKey() ?>" subject="<?php echo esc_specialchars($email_message->getSubject()) ?>" title="Read" alt="Read">
  <?php echo $email_message->getSubject() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at<?php echo !$email_message->getIsRead() ? ' read' : '' ?>" id="date_<?php echo $email_message->getPrimaryKey() ?>" title="Read" alt="Read">
  <?php echo false !== strtotime($email_message->getCreatedAt()) ? format_date($email_message->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
