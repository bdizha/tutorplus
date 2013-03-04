<?php foreach ($discussions as $discussion): ?>
    <?php include_partial('discussion/discussion', array('discussion' => $discussion, "helper" => $helper)) ?>
<?php endforeach; ?>