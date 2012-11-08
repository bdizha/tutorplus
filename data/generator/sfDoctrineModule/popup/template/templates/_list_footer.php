[?php use_helper('I18N', 'Date') ?]
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_new input").click(function(){
            openPopup("/<?php echo str_replace("_", "/", $this->getModuleName()) ?>/new", '[?php echo $helper->getPopupWidth() ?]', '[?php echo $helper->getPopupHeight() ?]', "[?php echo <?php echo ucwords($this->getI18NString('new.title')) ?> ?]");
            return false;
        });
        
        $(".sf_admin_action_edit a").click(function(){
            openPopup($(this).attr("popup_url"), '[?php echo $helper->getPopupWidth() ?]', '[?php echo $helper->getPopupHeight() ?]', "[?php echo <?php echo ucwords($this->getI18NString('edit.title')) ?> ?]");
            return false;
        });
    });
        
    function fetch<?php echo ucfirst(sfInflector::camelize($this->getModuleName())) ?>s(){
        window.location = "/<?php echo str_replace("_", "/", $this->getModuleName()) ?>";
    }
</script>