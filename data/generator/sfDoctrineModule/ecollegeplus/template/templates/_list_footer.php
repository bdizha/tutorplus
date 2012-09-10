[?php use_helper('I18N', 'Date') ?]
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_new input").click(function(){
            openPopup("/backend.php/<?php echo $this->getModuleName() ?>/new", '[?php echo sfConfig::get("app_popup_<?php echo $this->getModuleName() ?>_width") ?]', "480px", "[?php echo <?php echo ucwords($this->getI18NString('new.title')) ?> ?]");
            return false;
        });
        
        $(".sf_admin_action_edit a").click(function(){
            openPopup($(this).attr("popup_url"), '[?php echo sfConfig::get("app_popup_<?php echo $this->getModuleName() ?>_width") ?]', "480px", "[?php echo <?php echo ucwords($this->getI18NString('edit.title')) ?> ?]");
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