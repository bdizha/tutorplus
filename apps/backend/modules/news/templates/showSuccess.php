<?php use_helper('I18N', 'Date') ?>
<?php include_partial('news/flashes') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical', array("item_level_1" => "dashboard", "item_level_2" => "my_dashboard", "current_route" => "news")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("My Dashboard" => "dashboard", "News" => "news", "News ~ " . myToolkit::shortenString($news->getDescription(), 100) => "news/" . $news->getId()))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Read News', array(), 'messages') ?></h3>
</div>
<div class="content-block">
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <li class="sf_admin_action_news">
                <input type="button" class="button" onclick="window.location='/backend.php/news'" value="< News"/>
            </li>
        </ul>
    </div>    
    <h4 class="title"><?php echo $news->getHeading() ?></h4>   
    <div class="description">
        <?php echo $news->getDescription() ?>
    </div> 
    <div class="news-action">
        <ul class="sf_admin_actions" class="clear">
            <li class="sf_admin_action_news">
                <input type="button" class="button" onclick="window.location='/backend.php/news'" value="< News"/>
            </li>
        </ul>
    </div>
</div>