<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->showLinks($announcement)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->showBreadcrumbs($announcement)) ?>
<?php end_slot() ?>

<?php $user = $announcement->getUser() ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Read Announcement', array(), 'messages') ?></h3>
</div>
<div class="content-block">
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <?php echo $helper->linkToPrevious() ?>
        </ul>
    </div> 
    <div class="full-block">
        <h2><?php echo $announcement->getSubject() ?></h2>   
        <div class="description padding-10 white-background">
            <?php include_partial('personal_info/photo', array('user' => $user, "dimension" => 96)) ?>
            <?php echo link_to($user, 'profile_show', $user) ?>
            <?php echo $announcement->getHtmlizedMessage() ?>
        </div>         
    </div>
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <?php echo $helper->linkToPrevious() ?>
        </ul>
    </div>
</div>