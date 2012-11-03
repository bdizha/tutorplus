<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <h2>Announcements</h2>   
        <div id="announcements" class="full-block">
            <?php include_partial('announcement/list', array("announcements" => $announcements, "helper" => $helper, "showActions" => true)) ?>
        </div>
        <div class="announcement-action">
            <ul class="sf_admin_actions" class="clear">
                <?php if (count($announcements) == 0): ?>
                    <div class="no-result">There's no announcements currently.</div>
                <?php endif; ?>
                <?php foreach ($announcements as $i => $announcement): ?>    
                    <div class="even-row"> 
                        <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                        <div class="value">
                            <?php echo $announcement->getSubject() ?>
                            <?php echo $announcement->getHtmlizedMessage() ?>
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
                <?php if (isset($showMoreLink) && $showMoreLink && count($announcements) > $limit): ?>
                    <div class="more-link"><?php echo link_to("More Announcements", '@announcement') ?></div>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>