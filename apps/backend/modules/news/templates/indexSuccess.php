<?php use_helper('I18N', 'Date') ?>
<?php include_partial('news/flashes') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical', array("item_level_1" => "dashboard", "item_level_2" => "my_dashboard", "current_route" => "news")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
    <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("My Dashboard" => "dashboard", "News" => "news"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('News', array(), 'messages') ?></h3>
</div>
<div class="content-block">    
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <li class="sf_admin_action_announce">
                <input type="button" class="button" value="+ Announce"/>
            </li>
        </ul>
    </div>
    <h2>News</h2>
    <div id="newss">
        <?php include_partial('news/list', array("newsItems" => $newsItems, "helper" => $helper, "showActions" => true)) ?>
    </div>
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <li class="sf_admin_action_announce">
                <input type="button" class="button" value="+ Announce"/>
            </li>
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