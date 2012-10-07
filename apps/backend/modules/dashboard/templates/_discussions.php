<?php if (count($myDiscussions) == 0): ?>
    <div class="no-result">There's no joined discussions currently.</div>
<?php endif; ?>
<?php foreach ($myDiscussions as $myDiscussion): ?>
    <div class="even-row">
        <?php include_partial('personal_info/photo', array('user' => $myDiscussion->getUser(), "dimension" => 36)) ?>
        <?php echo link_to($myDiscussion->getName(), 'discussion_show', $myDiscussion) ?>
    </div> 
<?php endforeach; ?>