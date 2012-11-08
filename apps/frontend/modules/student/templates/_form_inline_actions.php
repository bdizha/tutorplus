<ul class="sf_admin_actions">
    <li class="sf_admin_action_cancel">
        <input class="cancel" type="button" value="Cancel" />                    
    </li>
    <li class="sf_admin_action_save">
        <input class="save" type="submit" value="Save" />
    </li>        
    <li class="sf_admin_action_done">
        <input class="done" type="button" value="Done" />   
    </li>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#student_inline_form_holder .save").click(function(){
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml); 
            
            $("#student_inline_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
                $.fn.colorbox.resize();
                
                // fetch relevant student details here
                fetchStudentDetails();
            });       
            return false;
        });        
        
        $(".sf_admin_action_cancel .cancel, .sf_admin_action_done .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });	
    });
</script>