<?php use_helper('I18N', 'Date') ?>
<div id="sf_admin_form_container">
    <?php include_partial('common/flashes', array('form' => $form)) ?>
    <div id="sf_admin_form_content">
        <div class="sf_admin_form">
            <form id="upload_photo_form" enctype="multipart/form-data" action="/backend.php/profile_upload_photo" method="post">
                <?php echo $form->renderHiddenFields(false) ?>
                <fieldset id="sf_fieldset_none">
                    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_filename">    
                        <div>
                            <label for="file_filename">Photo:</label>
                            <div class="content ">      
                                <?php echo $form['filename']->render() ?>     
                            </div>
                        </div>
                    </div>
                </fieldset>
                <ul class="sf_admin_actions">
                    <li class="sf_admin_action_cancel">
                        <input class="cancel" type="button" value="Cancel" />
                    </li>
                    <li class="sf_admin_action_save">
                        <input type="button" value="Upload" class="save" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){   
        $(".sf_admin_action_cancel .cancel, .sf_admin_action_done .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });    
        
        $(".sf_admin_action_save input").click(function(){ 
            $("#upload_photo_form").ajaxSubmit(function(data){  
                $("#cboxLoadedContentInner").hide();
                $("#cboxLoadedContent").append(loadingHtml);           
                if(isSuccess(data)){ 
                    openPopup("/backend.php/profile_crop_photo", "600px", "600px", "Crop Your profile photo");                
                }
                else
                { 
                    $("#cboxLoadedContent").html(data);                     
                }
            });            
            return false;
        });
    }); 
</script>