<?php if (count($discussions) == 0): ?>
    <div class="no-result">There's no joined discussions currently.</div>
<?php endif; ?>
<?php foreach ($discussions as $discussion): ?>
    <div class="even-row">
        <?php include_partial('personal_info/photo', array('user' => $discussion->getUser(), "dimension" => 36)) ?>
        <?php echo link_to($discussion->getName(), 'discussion_show', $discussion) ?>
    </div> 
<?php endforeach; ?>