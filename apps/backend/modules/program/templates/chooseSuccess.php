<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('common/flashes') ?>
            <form id="<?php echo $module ?>_choose_program_form" action="<?php echo url_for2('choose_program', array("module_name" => $module, "object_id" => $objectId)) ?>" method="post">
                <fieldset id="sf_fieldset_none">
                    <div class="sf_admin_form_row">
                        <?php foreach ($programmes as $key => $program): ?>
                            <div class="potential-list <?php echo fmod($key, 2) ? "right" : "left" ?>">
                                <div class="image">
                                    <img alt="<?php echo $program["name"] ?>" src="/images/icons/14x14/programmes.png"/>
                                </div>
                                <div class="name"><?php echo $program["name"] ?></div>
                                <div class="input">
                                    <input type="checkbox" name="programmes[]" value="<?php echo $program["id"] ?>" <?php echo (in_array($program["id"], $currentProgramIds)) ? "checked='checked'" : "" ?> id="course_<?php echo $program["id"] ?>" class="choose-input" />
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>          
                </fieldset>
            </form>            
        </div>            
    </div>            
</div>
<ul class="sf_admin_actions">
    <li class="sf_admin_action_cancel">
        <input class="cancel" type="button" value="Cancel"/>                                    
    </li>     
    <li class="sf_admin_action_done">
        <input class="done" type="button" value="Done"/>                                    
    </li>
    <li class="sf_admin_action_save">
        <input class="save add-programmes" type="button" value="Save"/>                    
    </li>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){	
        $(".add-programmes").click(function(){
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);            
            $("#<?php echo $module ?>_choose_program_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
                
                // fetch the module programes
                fetchProgrammes();
                
                $.fn.colorbox.resize();
            });            
            return false;
        });
        
        $(".cancel, .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });
    });
</script>