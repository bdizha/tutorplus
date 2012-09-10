<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($profile_qualification->getId(), 'profile_qualification_edit', $profile_qualification) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_id">
  <?php echo $profile_qualification->getUserId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_institution">
  <?php echo $profile_qualification->getInstitution() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $profile_qualification->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_year">
  <?php echo $profile_qualification->getYear() ?>
</td>
