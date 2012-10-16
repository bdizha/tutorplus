<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo link_to($assignment->getTitle(), 'assignment_show', $assignment) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_submission">
  <?php echo $assignment->getDisplaySubmission() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_due_date">
  <?php echo false !== strtotime($assignment->getDueDate()) ? format_date($assignment->getDueDate(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_weight">
  <?php echo $assignment->getWeight() ?>
</td>