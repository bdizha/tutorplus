<?php use_helper('I18N', 'Date') ?>
<?php include_partial('message_draft/flashes') ?>
<form action="<?php echo url_for('message_draft_collection', array('action' => 'batch')) ?>" id="batch_form" method="post">
    <input type="hidden" name="batch_action" id="batch_action" value=""/>
    <?php include_partial('message_draft/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <?php if ($pager->getNbResults()): ?>
        <div id="bottom-actions">
            <ul class="sf_admin_actions">
                <?php include_partial('message_draft/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('message_draft/list_actions', array('helper' => $helper)) ?>
            </ul>
        </div>
    <?php endif; ?>
</form>
<script type='text/javascript'>
    $(document).ready(function(){      
        // set the counts of the email labels
        setListCounts();
        
        $('.sf_admin_list_td_to_email, .sf_admin_list_td_subject, .sf_admin_list_td_created_at').click(function(){
            var emailIdParts = $(this).attr("id").split("_");
            
            $("#drafts_nav_tabs li").removeClass("active-tab");
            $("#message_edit_tab").addClass("active-tab").removeClass("hide");
            $("#email_container").html(loadingHtml);
            $("#message_edit_tab a").attr("href", "/message_draft_tab/" + emailIdParts[1] + "/edit");
            $("#email_container").load('/message_draft_tab/' + emailIdParts[1] + "/edit");
        });
        
        $(".batch_selects").change(function(){
            $("#batch_action").val($(this).val());
        });
        
        $('.save').click(function(){   
            if($(this).val() == "Go"){
                $("#batch_form").ajaxSubmit(function(data){
                    if(data == "success")
                    {
                        fetchDefaultTab();
                        $("li.tabs").removeClass("active");
                        $("#message_draft_tab").addClass("active");
                    }
                    else
                    {       
                        alert(data);
                    }
                });                
            }
        });
    });
    
    function setListCounts(){
        $("#message_inbox_item a").html("Inbox (<?php echo $totalInboxCount ?>)");
        $("#message_draft_item a").html("Drafts (<?php echo $totalDraftsCount ?>)");
        $("#message_sent_item a").html("Sent (<?php echo $totalSentCount ?>)");
        $("#message_trash_item a").html("Trash (<?php echo $totalTrashCount ?>)");
    }
</script>