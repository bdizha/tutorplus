<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('message_trash/flashes') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <ul class="nav-tabs" id="trash_nav_tabs">
            <li id="message_trash_tab" class="active-tab">
                <a href="/backend.php/message_trash_tab">Trash</a>
                <span class="list-count"><?php echo $totalTrashCount ?></span>
            </li>
        </ul>
        <div id="email_container" class="plain-row"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){	
       $("#trash_nav_tabs a").click(function(){
            $("#trash_nav_tabs li").removeClass("active-tab");
            $(this).parent().addClass("active-tab");
            $("#email_container").html(loadingHtml);
            $("#email_container").load($(this).attr("href"));
            
            return false;
        });
        
        // fetch the default tab
        fetchDefaultTab();
    });

    function fetchDefaultTab(){
        $("#email_container").html(loadingHtml);
        $("#email_container").load('/backend.php/message_trash_tab');
    }
</script>