<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?>
<div id="sf_admin_container">
	<div id="sf_admin_content">
		<div class="content-block">
			<ul class="nav-tabs" id="inbox_nav_tabs">
				<li id="message_inbox_tab" class="active-tab"><a
					href="/message/inbox/tab">Inbox</a> <span class="list-count"><?php echo $totalInboxCount ?>
				</span>
				</li>
				<li id="message_new_tab"><a href="/message/new/tab">Compose Message</a>
				</li>
				<li id="message_read_tab"><a id="message_read"
					href="/message/read/tab">&nbsp;</a>
				</li>
			</ul>
			<div id="email_container" class="tab-block "></div>
		</div>
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
    $("#email_container").load('/message/inbox/tab');
  }
</script>
