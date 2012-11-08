<?php use_helper('I18N', 'Date') ?>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#gradebook_items .sf_admin_action_new input").click(function(){
            openPopup("/gradebook_item/new", '<?php echo sfConfig::get("app_popup_gradebook_item_width") ?>', "480px", "<?php echo __('New Gradebook Item', Array(), 'messages') ?>");
            return false;
        });
        
        $("#gradebook_items .sf_admin_action_edit a").click(function(){
            openPopup($(this).attr("popup_url"), '<?php echo sfConfig::get("app_popup_gradebook_item_width") ?>', "480px", "<?php echo __('Edit Gradebook Item', Array(), 'messages') ?>");
            return false;
        }); 
        
        $("#gradebook_items .sf_admin_pagination li").click(function(){      
            $.get($(this).children('a').attr("href"), showGradebookItems);
            return false;
        });
        
        $("#gradebook_items th a").click(function(){      
            $.get($(this).attr("href"), showGradebookItems);
            return false;
        });
    });
</script>