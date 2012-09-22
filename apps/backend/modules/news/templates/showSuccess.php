<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->showLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->showBreadcrumbs()) ?>
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
    <div class="white-background">
        <h2><?php echo $news->getHeading() ?></h2>   
        <div class="description padding-10 full-block">
            <?php echo $news->getDescription() ?>
        </div>         
    </div>
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <?php echo $helper->linkToPrevious() ?>
        </ul>
    </div>
</div>