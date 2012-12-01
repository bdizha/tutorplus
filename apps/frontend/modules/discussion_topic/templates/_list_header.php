<?php use_helper('I18N', 'Date') ?>
<div class="full-block padding-10 plain-row"> 
    <a class="image" href="/profile">
        <?php include_partial('personal_info/photo', array('user' => $discussion->getUser(), "dimension" => 36)) ?>
    </a>
    <div class="value"><?php echo $discussion->getHtmlizedDescription() ?></div>
    <div class="user">By <?php echo link_to($discussion->getUser(), 'profile_show', $discussion->getUser()) ?> - <span class="datetime"><?php echo false !== strtotime($discussion->getUpdatedAt()) ? distance_of_time_in_words(strtotime($discussion->getUpdatedAt())) . " ago" : '&nbsp;' ?></span></div>
</div>