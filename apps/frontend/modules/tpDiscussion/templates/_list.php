<?php foreach ($discussions as $discussion): ?>
    <?php include_partial('tpDiscussion/discussion', array('discussion' => $discussion, "helper" => $helper)) ?>
<?php endforeach; ?>