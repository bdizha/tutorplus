<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('News', array(), 'messages') ?></h3>
</div>
<div class="content-block">    
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <?php echo $helper->linkToAnnounce() ?>
        </ul>
    </div>
    <div class="white-background">
        <h2>News</h2>
        <div id="news_items">
            <?php include_partial('news/list', array("newsItems" => $newsItems, "helper" => $helper, "showActions" => true)) ?>
        </div>
    </div>
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <?php echo $helper->linkToAnnounce() ?>
        </ul>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#newss .edit").click(function(){    
            openPopup($(this).attr("href"), '700px', '510px', "Edit News:");
            return false;
        });
        
        $(".sf_admin_action_announce input").click(function(){
            openPopup('/backend.php/news/new', '700px', "500px", "<?php echo __('Add News', Array(), 'messages') ?>");
            return false;
        });
    });
</script>