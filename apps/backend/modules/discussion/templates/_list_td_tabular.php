<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($discussion->getName(), 'discussion_show', $discussion) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_id">
  <?php echo $discussion->getUser() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_access_level">
  <?php echo $discussion->getAccessType() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nb_topics">
  <?php echo $discussion->getNbTopics() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nb_members">
  <?php echo $discussion->getNbMembers() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_last_visit">
  <?php echo false !== strtotime($discussion->getLastVisit()) ? format_date($discussion->getLastVisit(), "d/M/yyyy") : '&nbsp;' ?>
</td>