<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div id="sf_admin_content">
    <div class="content-block">
        <ul class="nav-tabs" id="inbox_nav_tabs">
            <li id="message_trash_tab" class="active-tab">
                <a href="/message/trash/tab">Trash</a>
                <span class="list-count"><?php echo $totalTrashCount ?></span>
            </li>
        </ul>
        <div id="email_container"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){	
        $("#inbox_nav_tabs a").click(function(){
            $("#inbox_nav_tabs li").removeClass("active-tab");
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
        $("#email_container").load('/message/trash/tab');
    }
</script>