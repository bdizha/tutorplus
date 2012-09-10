<?php use_helper('I18N', 'Date') ?>
<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "dashboard", "current_child" => "my_messages", "current_link" => "message_inbox")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Inbox" => "message_inbox"))) ?>
<?php end_slot() ?>

<?php include_partial('message_inbox/flashes') ?>
<ul class="heading-tabs">
    <li id="message_inbox_tab" class="active tabs"><a href="/backend.php/message_inbox_tab">Inbox</a></li>
    <li id="message_new_tab" class="normal tabs"><a href="/backend.php/message_new_tab">Compose Message</a></li>
    <li id="message_read_tab" class="normal tabs"><a id="message_read" href="/backend.php/message_read_tab">&nbsp;</a></li>
</ul>
<div id="tab_content"></div>
<script type="text/javascript">
    $(document).ready(function(){    
        // hide the read tab
        $("#message_read_tab").hide();
	
        $(".tabs a").click(function(){
            $("li.tabs").removeClass("active").addClass("normal");
            $(this).parent().addClass("active").removeClass("normal");
            $("#tab_content").html(loadingHtml);
            $("#tab_content").load($(this).attr("href"));
            return false;
        });
        
        // fetch the default tab
        fetchDefaultTab();
    });

    function fetchDefaultTab(){
        $("#tab_content").html(loadingHtml);
        $("#tab_content").load('/backend.php/message_inbox_tab');
    }
</script>