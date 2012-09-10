<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('common/flashes') ?>
            <form id="<?php echo $module ?>_choose_mailing_list_form" action="<?php echo url_for2('choose_mailing_list', array("module_name" => $module, "object_id" => $objectId)) ?>" method="post">
                <fieldset id="sf_fieldset_none">
                    <div class="sf_admin_form_row">
                        <?php foreach ($mailingLists as $key => $mailingList): ?>
                            <div class="potential-list <?php echo fmod($key, 2) ? "right" : "left" ?>">
                                <div class="image">
                                    <img alt="<?php echo $mailingList["name"] ?>" src="/images/icons/14x14/mailing_lists.png"/>
                                </div>
                                <div class="name"><?php echo $mailingList["name"] ?></div>
                                <div class="input">
                                    <input type="checkbox" name="mailing_lists[]" value="<?php echo $mailingList["id"] ?>" <?php echo (in_array($mailingList["id"], $currentMailingListIds)) ? "checked='checked'" : "" ?> id="course_<?php echo $mailingList["id"] ?>" class="choose-input" />
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
        <input class="save add-mailing-lists" type="button" value="Save"/>                    
    </li>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){	
        $(".add-mailing-lists").click(function(){
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);            
            $("#<?php echo $module ?>_choose_mailing_list_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
                
                // fetch the module mailing lists
                fetchMailingLists();
                
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