<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($profile_award->getId(), 'profile_award_edit', $profile_award) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_id">
  <?php echo $profile_award->getUserId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_institution">
  <?php echo $profile_award->getInstitution() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $profile_award->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_year">
  <?php echo $profile_award->getYear() ?>
</td>
