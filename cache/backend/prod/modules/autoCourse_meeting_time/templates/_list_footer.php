<?php use_helper('I18N', 'Date') ?>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_new input").click(function(){
            openPopup("/backend.php/course_meeting_time/new", '<?php echo sfConfig::get("app_popup_course_meeting_time_width") ?>', "480px", "<?php echo __('New Course Meeting Time', Array(), 'messages') ?>");
            return false;
        });
        
        $(".sf_admin_action_edit a").click(function(){
            openPopup($(this).attr("popup_url"), '<?php echo sfConfig::get("app_popup_course_meeting_time_width") ?>', "480px", "<?php echo __('Edit Course Meeting Time', Array(), 'messages') ?>");
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