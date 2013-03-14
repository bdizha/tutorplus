<?php use_helper('I18N', 'Date') ?>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#gradebook_scale .sf_admin_action_new input").click(function(){
            openPopup("/gradebook_scale/new", '<?php echo sfConfig::get("app_popup_gradebook_scale_width") ?>', "480px", "<?php echo __('New Gradebook Scale', Array(), 'messages') ?>");
            return false;
        });
        
        $("#gradebook_scale .sf_admin_action_edit a").click(function(){
            openPopup($(this).attr("popup_url"), '<?php echo sfConfig::get("app_popup_gradebook_scale_width") ?>', "480px", "<?php echo __('Edit Gradebook Scale', Array(), 'messages') ?>");
            return false;
        });  
        
        $("#gradebook_scale .sf_admin_pagination li").click(function(){      
            $.get($(this).children('a').attr("href"), showGradebookScale);
            return false;
        });
        
        $("#gradebook_scale th a").click(function(){      
            $.get($(this).attr("href"), showGradebookScale);
            return false;
        });
    });
</script>