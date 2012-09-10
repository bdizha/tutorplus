<?php use_helper('I18N', 'Date') ?>
<div class="content-block">    
    <h2>Notification Settings<span class="actions"><a href="/backend.php/notification_settings/<?php echo $notification_settings->getId() ?>/edit" id="edit_notification_settings">Edit</a></span></h2>
    <div id="notification_settings_container">
        <div class="profile_row">    
            <div>
                <label>Attribute:</label>
                <div class="content">
                    Value
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#edit_notification_settings").click(function(){
        myModal("Edit Notification Settings", $(this).attr("href"), 310, 510);
        return false;
    });
</script>