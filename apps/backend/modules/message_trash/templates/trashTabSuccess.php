<?php use_helper('I18N', 'Date') ?>
<?php include_partial('message_trash/assets') ?>
<?php include_partial('message_trash/flashes') ?>

<form action="<?php echo url_for('message_trash_collection', array('action' => 'batch')) ?>" id="batch_form" method="post">
    <?php if ($pager->getNbResults()): ?>
        <div id="top-actions">
            <ul class="sf_admin_actions">
                <?php include_partial('message_trash/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('message_trash/list_actions', array('helper' => $helper)) ?>
            </ul>
        </div>
    <?php else: ?>
    <div class="break">&nbsp;</div>
    <?php endif; ?>
    <input type="hidden" name="batch_action" id="batch_action" value=""/>
    <?php include_partial('message_trash/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <?php if ($pager->getNbResults()): ?>
        <div id="bottom-actions">
            <ul class="sf_admin_actions">
                <?php include_partial('message_trash/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('message_trash/list_actions', array('helper' => $helper)) ?>
            </ul>
        </div>
    <?php endif; ?>
</form>
<script type='text/javascript'>
    $(document).ready(function(){       
        // set the counts of the email labels
        setListCounts();
        
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
                        $("#message_trash_tab").addClass("active");
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
        $("#message_inbox").html("Inbox (<?php echo $total_inbox_count ?>)");
        $("#message_draft").html("Drafts (<?php echo $total_drafts_count ?>)");
        $("#message_sent").html("Sent (<?php echo $total_sent_count ?>)");
        $("#message_trash").html("Trash (<?php echo $total_trash_count ?>)");
    }
</script>