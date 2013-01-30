<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('common/flashes_normal') ?>
            <div id="crop_area">
                <img src="/profile/show/photo/<?php echo $sf_user->getId() ?>/resized/<?php echo time() ?>" id="cropbox" />
                <form action="/profile/crop/photo" method="post" id="crop_photo_form">
                    <input type="hidden" id="x" name="x" />
                    <input type="hidden" id="y" name="y" />
                    <input type="hidden" id="w" name="w" />
                    <input type="hidden" id="h" name="h" />
                    <ul class="sf_admin_actions">
                        <li class="sf_admin_action_cancel">
                            <input class="cancel" type="button" value="Cancel" />
                        </li>        
                        <li class="sf_admin_action_done">
                            <input class="done" type="button" value="Done" />            
                        </li>
                        <li class="sf_admin_action_save">
                            <input type="button" value="Crop & Save" class="save" />
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //<![DATA[
    $(document).ready(function(){ 
        $(function(){
            $('#cropbox').Jcrop({
                aspectRatio: 1,
                minSize: [96, 96],
                maxSize: [392, 392],
                onSelect: updateCoords
            });
        });

        function updateCoords(c)
        {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };

        function checkCoords()
        {
            if (parseInt($('#w').val())) return true;
            alert('Please select a crop region then press "Crop & Save"!');
            return false;
        };      
        
        $(".sf_admin_action_cancel .cancel, .sf_admin_action_done .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });
        
        $(".sf_admin_action_save input").click(function(){ 
            if(checkCoords())
            {                    
                $("#crop_photo_form").ajaxSubmit(function(data){
                    $("#cboxLoadedContentInner").hide();
                    $("#cboxLoadedContent").append(loadingHtml);           
                    if(isSuccess(data)){ 
                        window.location.href = "/profile/<?php echo $sf_user->getProfile()->getSlug() ?>";   
                    }
                    else
                    { 
                        $("#cboxLoadedContent").html(data);
                        $.fn.colorbox.resize();                     
                    }
                });            
                return false;
            }
        });
    });
    //]]
</script>