<?php if (count($discussions) == 0): ?>
    <div class="no-result">You aren't linked to any discussions yet</div>
<?php endif; ?>
<?php foreach ($discussions as $discussion): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('tpPersonalInfo/photo', array('profile' => $discussion->getProfile(), "dimension" => 36)) ?>
            <?php echo link_to($discussion->getName(), 'discussion_show', $discussion) ?>
        </div>
    </div>
<?php endforeach; ?>