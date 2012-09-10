<td colspan="5">
  <?php echo __('%%id%% - %%user_id%% - %%institution%% - %%description%% - %%year%%', array('%%id%%' => link_to($profile_qualification->getId(), 'profile_qualification_edit', $profile_qualification), '%%user_id%%' => $profile_qualification->getUserId(), '%%institution%%' => $profile_qualification->getInstitution(), '%%description%%' => $profile_qualification->getDescription(), '%%year%%' => $profile_qualification->getYear()), 'messages') ?>
</td>
