<?php use_helper('I18N', 'Date') ?>
<div class="full-block padding-10 "> 
    <a class="image" href="/profile">
        <?php include_partial('personal_info/photo', array('profile' => $discussionGroup->getProfile(), "dimension" => 36)) ?>
    </a>
    <div class="value"><?php echo $discussionGroup->getDescription() ?></div>
    <div class="user">By <?php echo link_to($discussionGroup->getProfile(), 'profile_show', $discussionGroup->getProfile()) ?> - <span class="datetime"><?php echo false !== strtotime($discussionGroup->getUpdatedAt()) ? distance_of_time_in_words(strtotime($discussionGroup->getUpdatedAt())) . " ago" : '&nbsp;' ?></span></div>
</div>