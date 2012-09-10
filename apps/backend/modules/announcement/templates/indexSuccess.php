<?php use_helper('I18N', 'Date') ?>
<?php include_partial('announcement/flashes') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical', array("item_level_1" => "dashboard", "item_level_2" => "my_dashboard", "current_route" => "announcement")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
    <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("My Dashboard" => "dashboard", "Notice Board" => "announcement"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Notice Board', array(), 'messages') ?></h3>
</div>
<div class="content-block">    
    <div class="announcement-action">
        <ul class="sf_admin_actions" class="clear">
            <li class="sf_admin_action_announce">
                <input type="button" class="button" value="+ Announce"/>
            </li>
        </ul>
    </div>
    <h2>Announcements</h2>
    <div id="announcements">
        <?php include_partial('announcement/list', array("announcements" => $announcements, "helper" => $helper, "showActions" => true)) ?>
    </div>
    <div class="announcement-action">
        <ul class="sf_admin_actions" class="clear">
            <li class="sf_admin_action_announce">
                <input type="button" class="button" value="+ Announce"/>
            </li>
        </ul>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#announcements .edit").click(function(){    
            openPopup($(this).attr("href"), '600px', '510px', "Edit Announcement:");
            return false;
        });
        
        $(".sf_admin_action_announce input").click(function(){
            openPopup('/backend.php/announcement/new', '600px', "500px", "<?php echo __('Add Announcement', Array(), 'messages') ?>");
            return false;
        });
    });
</script>