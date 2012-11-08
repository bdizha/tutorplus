<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('message_draft/flashes') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <ul class="nav-tabs" id="drafts_nav_tabs">
            <li id="message_draft_tab" class="active-tab">
                <a href="/message_draft_tab">Drafts</a>
                <span class="list-count"><?php echo $totalDraftsCount ?></span>
            </li>
            <li id="message_edit_tab" class="hide"><a href="/message_edit_tab">Compose Message</a></li>
        </ul>
        <div id="email_container" class="plain-row"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){	
        $("#drafts_nav_tabs a").click(function(){
            $("#drafts_nav_tabs li").removeClass("active-tab");
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
        $("#email_container").load('/message_draft_tab');
    }
</script>