<ul class="sf_admin_actions">
    <li class="sf_admin_action_cancel">
        <input class="cancel" type="button" value="Cancel">                    
    </li>     
    <li class="sf_admin_action_done">
        <input class="done" type="button" value="Done">   
    </li>
    <li class="sf_admin_action_save">
        <input class="save" type="button" value="Save">
    </li>   
</ul>
<script type='text/javascript'>
    $(document).ready(function(){        
        $('#profile_info_form_holder .save').click(function(){    
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);
            
            $("#profile_info_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
                $.fn.colorbox.resize();
            });
        });
        
        $("#profile_info_form_holder .cancel, #profile_info_form_holder .done").click(function(){
            fetchProfileInfo();
            $.fn.colorbox.close();
            return false;
        });
    });
</script>
