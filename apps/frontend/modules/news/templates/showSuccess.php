<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->showLinks($newsItem)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->showBreadcrumbs($newsItem)) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Read News', array(), 'messages') ?></h3>
</div>
<div class="content-block">
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <?php echo $helper->linkToPrevious() ?>
        </ul>
    </div> 
    <div class="full-block">
        <h2><?php echo $newsItem->getHeading() ?></h2>   
        <div class="padding-10 description white-background">
            <?php echo $newsItem->getHtmlizedDescription() ?>
        </div>         
    </div>
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <?php echo $helper->linkToPrevious() ?>
        </ul>
    </div>
</div>