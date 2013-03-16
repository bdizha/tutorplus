<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?>
<div id="sf_admin_content">
	<div class="content-block">
		<ul class="nav-tabs" id="inbox_nav_tabs">
			<li id="message_draft_tab" class="active-tab"><a
				href="/message/draft/tab">Drafts</a> <span class="list-count"><?php echo $totalDraftsCount ?>
			</span>
			</li>
			<li id="message_edit_tab" class="hide"><a href="/message_edit_tab">Compose
					Message</a>
			</li>
		</ul>
		<div id="email_container" class="tab-block "></div>
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
        $("#email_container").load('/message/draft/tab');
    }
</script>
