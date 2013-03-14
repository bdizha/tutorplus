<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div id="sf_admin_container">
	<div id="sf_admin_content">
		<div class="content-block">
			<ul class="nav-tabs" id="inbox_nav_tabs">
				<li id="message_sent_tab" class="active-tab"><a
					href="/message/sent/tab">Sent</a> <span class="list-count"><?php echo $totalSentCount ?>
				</span>
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
    $("#email_container").load('/message/sent/tab');
  }
</script>
