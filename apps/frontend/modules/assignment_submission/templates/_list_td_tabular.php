<td class="sf_admin_text sf_admin_list_td_generated_file">
    <?php echo link_to(__( $assignment_submission->getGeneratedFile()), "/uploads/assignments/" . $assignment_submission->getAssignmentId() . "/" . $assignment_submission->getGeneratedFile(), array("target" => "blank")) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($assignment_submission->getUpdatedAt()) ? format_date($assignment_submission->getUpdatedAt(), "d-M-y H:m a") : '&nbsp;' ?>
</td>