<?php use_helper('I18N', 'Date') ?>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_new input").click(function(){
            openPopup("/backend.php/announcement/new", '<?php echo sfConfig::get("app_popup_announcement_width") ?>', "480px", "<?php echo __('New Announcement', Array(), 'messages') ?>");
            return false;
        });
        
        $(".sf_admin_action_edit a").click(function(){
            openPopup($(this).attr("popup_url"), '<?php echo sfConfig::get("app_popup_announcement_width") ?>', "480px", "<?php echo __('Edit Announcement', Array(), 'messages') ?>");
            return false;
        });
	
        function submitDoubleListValues(){
            $("select.double_list_select-selected").each(function(){
                $("#" + this.id + " option").each(function(){
                    $(this).attr("selected", "selected");
                });
            });
        }
    });
</script>