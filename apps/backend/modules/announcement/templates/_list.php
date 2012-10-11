<?php foreach ($announcements as $i => $announcement): ?>    
    <div class="even-row"> 
        <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
        <div class="value">
            <?php echo $announcement->getSubject() ?>
            <?php echo $announcement->getMessage() ?>
        </div>
        <div class="user">By <?php echo link_to($announcement->getUser(), "profile") ?>  - <span class="datetime"><?php echo false !== strtotime($announcement->getUpdatedAt()) ? distance_of_time_in_words(strtotime($announcement->getUpdatedAt())) . " ago" : '&nbsp;' ?></span></div>
        <?php if (isset($showActions) && $showActions && false): ?>
            <div class="item-actions">
                <?php echo $helper->linkToEdit($announcement, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
                <?php echo $helper->linkToDelete($announcement, array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
<?php if (isset($show_more_link) && $show_more_link && count($announcements) > $limit): ?>
    <div class="more-link"><?php echo link_to("More Announcements", '@announcement') ?></div>
<?php endif; ?>