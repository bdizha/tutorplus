<?php use_helper('I18N', 'Date') ?>
<?php $announcement = Doctrine_Core::getTable('Announcement')->findOneById($activityFeed->getItemId()) ?>
<?php if ($announcement): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('tpPersonalInfo/photo', array('profile' => $announcement->getProfile(), "dimension" => 36)) ?>
            <?php echo link_to($announcement->getProfile(), 'profile_show', $announcement->getProfile()) ?> announced: 
            <?php echo link_to($announcement->getSubject(), 'announcement') ?> -
            <span class="datetime"><?php echo myToolkit::dateInWords($announcement->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>