<?php foreach ($newss as $i => $news): ?>    
    <div class="news">
        <div class="inline-block">
            <div class="image">
                <img alt="Precious Mugaragumbo" src="/uploads/users/6/avatar_36.png">
            </div>
        </div>
        <div class="inline-block news-details">
            <h4 class="title"><?php echo $news->getHeading() ?></h4>
            <div class="body">	
                <?php echo $news->getBlurb() ?>
                <?php echo link_to2("Read More", "news_show", array("id" => $news->getId()), array("class" => "read-more")) ?>
            </div>
            <div class="meta">
                <span class="datetime">
                    <?php echo false !== strtotime($news->getUpdatedAt()) ? distance_of_time_in_words(strtotime($news->getUpdatedAt())) . " ago" : '&nbsp;' ?> by
                </span>
                <?php echo link_to($news->getUser(), "profile") ?>
            </div>
        </div>
        <?php if (isset($showActions) && $showActions): ?>
            <div class="item-actions">
                <?php echo $helper->linkToEdit($news, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
                <?php echo $helper->linkToDelete($news, array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
<?php if (isset($showMoreLink) && $showMoreLink && count($newss) > $limit): ?>
    <div class="more-link"><?php echo link_to("More News", '@news') ?></div>
<?php endif; ?>