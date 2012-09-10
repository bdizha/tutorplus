<?php use_helper('I18N', 'Date') ?>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_new input").click(function(){
            openPopup("/backend.php/news/new", '<?php echo sfConfig::get("app_popup_news_width") ?>', "480px", "<?php echo __('New News', Array(), 'messages') ?>");
            return false;
        });
        
        $(".sf_admin_action_edit a").click(function(){
            openPopup($(this).attr("popup_url"), '<?php echo sfConfig::get("app_popup_news_width") ?>', "480px", "<?php echo __('Edit News', Array(), 'messages') ?>");
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