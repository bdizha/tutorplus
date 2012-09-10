<?php use_helper('I18N', 'Date') ?>
<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "dashboard", "current_child" => "my_messages", "current_link" => "message_trash")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Trash" => "message_trash"))) ?>
<?php end_slot() ?>

<?php include_partial('message_trash/flashes') ?>
<ul class="heading-tabs">
    <li id="message_trash_tab" class="active tabs"><a href="/backend.php/message_trash_tab">Trash</a></li>
</ul>
<div id="tab_content"></div>
<script type="text/javascript">
    $(document).ready(function(){
	
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
        $("#tab_content").load('/backend.php/message_trash_tab');
    }
</script>