<script type='text/javascript'>
    $(document).ready(function(){
        $("#color_picker div").click(function(){
            $("#calendar_color").val($(this).attr("id"));
        });
    });
    
    function fetchCalendars(){
        window.location.reload();
    }
</script>