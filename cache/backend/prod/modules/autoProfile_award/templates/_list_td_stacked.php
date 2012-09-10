<td colspan="5">
  <?php echo __('%%id%% - %%user_id%% - %%institution%% - %%description%% - %%year%%', array('%%id%%' => link_to($profile_award->getId(), 'profile_award_edit', $profile_award), '%%user_id%%' => $profile_award->getUserId(), '%%institution%%' => $profile_award->getInstitution(), '%%description%%' => $profile_award->getDescription(), '%%year%%' => $profile_award->getYear()), 'messages') ?>
</td>
