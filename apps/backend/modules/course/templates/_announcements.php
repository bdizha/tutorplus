<div id="course_announcements">
    <?php foreach ($course->retrieveAnnouncements($limit) as $i => $announcement): ?>    
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
            <div class="actions">
                <?php echo $helper->linkToEdit($course, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
                <?php echo $helper->linkToDelete($course, array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>