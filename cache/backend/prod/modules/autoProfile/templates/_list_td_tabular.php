<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($sf_guard_user->getId(), 'profile_edit', $sf_guard_user) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_first_name">
  <?php echo $sf_guard_user->getFirstName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_last_name">
  <?php echo $sf_guard_user->getLastName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email_address">
  <?php echo $sf_guard_user->getEmailAddress() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_username">
  <?php echo $sf_guard_user->getUsername() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_algorithm">
  <?php echo $sf_guard_user->getAlgorithm() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_salt">
  <?php echo $sf_guard_user->getSalt() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_password">
  <?php echo $sf_guard_user->getPassword() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php echo get_partial('profile/list_field_boolean', array('value' => $sf_guard_user->getIsActive())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_super_admin">
  <?php echo get_partial('profile/list_field_boolean', array('value' => $sf_guard_user->getIsSuperAdmin())) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_last_login">
  <?php echo false !== strtotime($sf_guard_user->getLastLogin()) ? format_date($sf_guard_user->getLastLogin(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($sf_guard_user->getCreatedAt()) ? format_date($sf_guard_user->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($sf_guard_user->getUpdatedAt()) ? format_date($sf_guard_user->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_slug">
  <?php echo $sf_guard_user->getSlug() ?>
</td>
