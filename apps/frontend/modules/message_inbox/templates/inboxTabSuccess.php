<?php use_helper('I18N', 'Date') ?>
<?php include_partial('message_inbox/assets') ?>
<?php include_partial('message_inbox/flashes') ?>

<form action="<?php echo url_for('message_inbox_collection', array('action' => 'batch')) ?>" id="batch_form" method="post">
    <input type="hidden" name="batch_action" id="batch_action" value=""/>
    <?php include_partial('message_inbox/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <?php if ($pager->getNbResults()): ?>
        <div id="bottom-actions">
            <ul class="sf_admin_actions">
                <?php include_partial('message_inbox/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('message_inbox/list_actions', array('helper' => $helper)) ?>
            </ul>
        </div>
    <?php endif; ?>
</form>
<script type='text/javascript'>
    $(document).ready(function(){        
        // set the counts of the email labels
        setListCounts();
        
        // handle message clicks
        $('.sf_admin_list_td_from_emails, .sf_admin_list_td_subject, .sf_admin_list_td_created_at').click(function(){
            // get the second td element
            var subject = $(this).attr('subject');
            $("#message_read").html(subject);
            $("#message_read_tab").show();
            
            var emailIdParts = $(this).attr("id").split("_");
            
            $("#inbox_nav_tabs li").removeClass("active-tab");
            $("#message_read_tab").addClass("active-tab")
            $("#email_container").html(loadingHtml);
            $("#email_container").load('/message/read/tab/' + emailIdParts[1]);
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
                        $("#message_inbox_tab").addClass("active");
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