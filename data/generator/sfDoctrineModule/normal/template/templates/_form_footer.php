<script type="text/javascript">
    $(".save, .button, .new").click(function(){
        $(this).addClass('hide');
        $(this).parent().append(loadingButtonHtml);
        rotateLoading();
    });
</script>