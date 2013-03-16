<?php use_helper('I18N', 'Date') ?>
<?php $discussion = Doctrine_Core::getTable('Discussion')->findOneById($activityFeed->getItemId()) ?>
<?php if ($discussion): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('tpPersonalInfo/photo', array('profile' => $discussion->getProfile(), "dimension" => 36)) ?>
            <?php echo link_to($discussion->getProfile(), 'profile_show', $discussion->getProfile()) ?> created a discussion group: 
            <?php echo link_to($discussion->getName(), 'discussion_show', $discussion) ?> -
            <span class="datetime"><?php echo myToolkit::dateInWords($discussion->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>