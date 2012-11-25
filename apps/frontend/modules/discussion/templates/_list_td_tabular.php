<td class="sf_admin_text sf_admin_list_td_name">
    <?php echo link_to(myToolkit::shortenString($discussion->getName(), 50), 'discussion_show', $discussion) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_id">
    <?php $user = $discussion->getUser() ?>
    <?php include_partial('personal_info/photo', array('user' => $user, "dimension" => 24)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_access_level">
    <?php echo $discussion->getAccessType() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nb_topics">
    <?php echo $discussion->getNbTopics() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_last_visit">
    <?php echo myToolkit::dateInWords($discussion->getLastVisit()); ?>
</td>