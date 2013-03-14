<?php use_helper('I18N', 'Date') ?>
<?php $discussion = Doctrine_Core::getTable('Discussion')->findOneById($activityFeed->getItemId()) ?>
<?php if ($discussion): ?>
    <?php include_partial('discussion/discussion', array('discussion' => $discussion, "showActions" => false)) ?>
<?php endif; ?>