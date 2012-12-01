<script type='text/javascript'>
    $(document).ready(function(){	
        $('#course_description').redactor();
    });
    
    $(".save, .button, .new").click(function(){
        $(this).addClass('hide');
        $(this).parent().append(loadingButtonHtml);
        rotateLoading();
    });
</script>