<?php foreach ($announcements as $i => $announcement): ?>    
    <div class="announcement">
        <div class="inline-block">
            <div class="image">
                <img alt="Precious Mugaragumbo" src="/uploads/users/6/avatar_36.png">
            </div>
        </div>
        <div class="inline-block announcement-details">
            <h4 class="title"><?php echo $announcement->getSubject() ?></h4>
            <div class="body">	
                <?php echo $announcement->getMessage() ?>	      					
            </div>
            <div class="meta">
                <span class="datetime">
                    <?php echo false !== strtotime($announcement->getUpdatedAt()) ? distance_of_time_in_words(strtotime($announcement->getUpdatedAt())) . " ago" : '&nbsp;' ?> by
                </span>
                <?php echo link_to($announcement->getUser(), "profile") ?>
            </div>
        </div>
        <?php if (isset($showActions) && $showActions): ?>
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