<?php use_helper('I18N', 'Date') ?>
<?php include_partial('message_inbox/assets') ?>
<?php include_partial('message_inbox/flashes') ?>

<?php slot('nav_vertical') ?>
    <?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard2", "item_level_2" => "message", "current_route" => "message_inbox", "module" => "message_inbox", "include_top_menu" => true, "partial" => "nav_vertical_top")) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Inbox', array(), 'messages') ?></h3>
</div>
<div>
    <ul id="settings_nav" class="tabs clearfix">
        <li id="message_inbox" class="active tabs"><a href="message_inbox">Inbox 15 emails</a></li>
        <li id="message_new" class="tabs"><a href="#message_new">New email message</a></li>
        <li id="message_contacts" class="tabs"><a href="#message_contacts">Contacts</a></li>
        <li id="message_read" class="tabs"><a href="#message_read">Hello Batanayi, good day!</a></li>
    </ul>
</div>
<div id="sf_admin_content">
    <?php include_partial('message_inbox/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('message_inbox/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('message_inbox/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>
<div id="sf_admin_footer">
    <?php include_partial('message_inbox/list_footer', array('pager' => $pager)) ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        fetchDefaultTab();
	
        $(".tabs").click(function(){
            $(".tabs").removeClass("active");
            $(this).addClass("active");
            $("#sf_admin_content").load('/backend.php/' + this.id);
            return false;
        });
    });

    function fetchDefaultTab(){
        $("#sf_admin_content").load('/backend.php/message_inbox');
    }
</script>