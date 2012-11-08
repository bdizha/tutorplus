<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <h2>News</h2>   
        <div id="news_items" class="full-block">
            <?php if (count($newsItems) == 0): ?>
                <div class="no-result">There's no news currently.</div>
            <?php endif; ?>
            <?php foreach ($newsItems as $i => $newsItem): ?>    
                <div class="even-row"> 
                    <a class="image" href="/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                    <div class="value">
                        <?php echo $newsItem->getHeading() ?>
                        <?php echo $newsItem->getBlurb() ?>
                        <?php echo link_to2("Read More", "news_show", array("slug" => "batanayi"), array("class" => "read-more")) ?>
                    </div>
                    <div class="user">By <?php echo link_to($newsItem->getUser(), "profile") ?>  - <span class="datetime"><?php echo false !== strtotime($newsItem->getUpdatedAt()) ? distance_of_time_in_words(strtotime($newsItem->getUpdatedAt())) . " ago" : '&nbsp;' ?></span></div>
                    <?php if (isset($showActions) && $showActions && false): ?>
                        <div class="item-actions">
                            <?php echo $helper->linkToEdit($newsItem, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
                            <?php echo $helper->linkToDelete($newsItem, array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <?php if (isset($showMoreLink) && $showMoreLink && count($newsItems) > $limit): ?>
                <div class="more-link"><?php echo link_to("More News", '@news') ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>