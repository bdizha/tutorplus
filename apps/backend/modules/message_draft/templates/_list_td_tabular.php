<td class="sf_admin_text sf_admin_list_td_to_email" id="subject_<?php echo $email_message->getPrimaryKey() ?>" title="Read" alt="Read">
  <?php echo $email_message->getToEmail() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_subject" id="subject_<?php echo $email_message->getPrimaryKey() ?>" title="Read" alt="Read">
  <?php echo $email_message->getSubject() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($email_message->getCreatedAt()) ? format_date($email_message->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
