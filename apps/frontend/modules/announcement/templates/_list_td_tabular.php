<?php $user = $announcement->getUser() ?>
<td class="sf_admin_text sf_admin_list_td_user">
    <?php include_partial('personal_info/photo', array('user' => $user, "dimension" => 24)) ?>
    <?php echo link_to($user, 'profile_show', $user) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_subject">
    <?php echo link_to(myToolkit::shortenString($announcement->getSubject(), 100), 'announcement_show', $announcement) ?>
</td>