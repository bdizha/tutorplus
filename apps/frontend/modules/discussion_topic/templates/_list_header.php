<?php use_helper('I18N', 'Date') ?>
<div class="full-block padding-10 "> 
    <a class="image" href="/profile">
        <?php include_partial('personal_info/photo', array('profile' => $discussion->getProfile(), "dimension" => 36)) ?>
    </a>
    <div class="value"><?php echo $discussion->getDescription() ?></div>
    <div class="user">By <?php echo link_to($discussion->getProfile(), 'profile_show', $discussion->getProfile()) ?> - <span class="datetime"><?php echo false !== strtotime($discussion->getUpdatedAt()) ? distance_of_time_in_words(strtotime($discussion->getUpdatedAt())) . " ago" : '&nbsp;' ?></span></div>
</div>