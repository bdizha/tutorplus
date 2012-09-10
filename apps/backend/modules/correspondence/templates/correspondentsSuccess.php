<?php use_helper('I18N', 'Date') ?>

<div id="sf_admin_form_container">
    <?php include_partial('correspondence/flashes') ?>
    <?php $i = 0; ?>
    <div id="sf_admin_content">
        <div id="view_all_correspondents_content">
            <div class="correspondents_row">
                <?php foreach ($my_correspondents as $correspondent): ?>
                    <?php $i++; ?>
                    <div class="corresponden_col <?php echo (fmod($i, 4) == 1) ? 'first' : '' ?>">
                        <img class="profile-avator" src="/uploads/users/10/normal-36.jpg"/>
                        <div class="user_name"><a href="/backend.php/profile"><?php echo $correspondent->getCorrespondent() ?></a></div>
                        <div class="email_user">&nbsp;</div>
                        <div class="remove_user" id="/backend.php/correspondence/<?php echo $correspondent->getId() ?>" alt="remove" title="remove">&nbsp;</div>
                    </div>          
                <?php endforeach; ?>
            </div>
        </div>
        <div id="invite_correspondents_content">
            <label for="correspondence_innitiator">Invite correspondents by email:</label>
            <div class="content" id="correspondents">  
                <ul>
                    <li class="sf_admin_action_correspondent"></li>
                </ul>
                <form style="clear: both" id="invite_correspondents_form" enctype="multipart/form-data" action="/backend.php/correspondence" method="post">
                    <?php echo $form->renderHiddenFields(false) ?>
                    <input type="hidden" value="correspondents" id="correspondence_redirect" name="correspondence[redirect]"></input>
                    <input type="text" id="autocomplete_correspondence_correspondent" value="+ add more correspondents" name="autocomplete_correspondence[correspondent]" autocomplete="off" class="ac_input" title="+ add more correspondents"/>
                </form>
                <form method="post" action="/backend.php/correspondence" enctype="multipart/form-data" style="" id="remove_correspondents_form" style="clear: both">
                    <input type="hidden" id="sf_method" value="delete" name="sf_method">
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){         
        jQuery("#autocomplete_correspondence_correspondent").autocomplete('/backend.php/invite_correspondence', jQuery.extend({}, {
            dataType: 'json',
            parse: function(data) {
                var parsed = [];
                for (key in data) {
                    parsed[parsed.length] = { data: [ data[key], key ], value: data[key], result: data[key] };
                }
                return parsed;
            }
        }, {}))
        .result(function(event, data){
            $("#invite_correspondents_form").append("<input type=\"hidden\" value=\"" + data[1] + "\" id=\"correspondence_correspondent_ids_" + data[1] + "\" name=\"correspondence[correspondent_ids][]\"/>");            
            $("#correspondents li").append("<div class=\"correspondent\"><span style=\"float: left;\">" + data[0] + "</span><span style=\"float:right;\" class=\"remove\" onclick=\"removeCorrespondent(this);\">x</span></div>")
        })
        .keyup(function() {
            if(this.value.length == 0) {
                $('#correspondence_correspondent').val('');
            }
            else
            {       
                $('#correspondence_correspondent').val('+ add more correspondents');
            }
        });
        
        $("#correspondents").click(function (){
            $('#autocomplete_correspondence_correspondent').val('');
            $("#autocomplete_correspondence_correspondent").focus();
        });
        
        $("#autocomplete_correspondence_correspondent").live('focus', function(){
            if($(this).val() == this.title){
                $(this).val("");
            }
        });
	
        $("#autocomplete_correspondence_correspondent").live('blur', function(){
            if($(this).val() == ""){
                $(this).val(this.title);
            }
        });
        
        $(".remove_user").click(function(){     
            $("#remove_correspondents_form").attr("action", this.id);
            
            $("#remove_correspondents_form").ajaxSubmit(function(data){
                $("#view_all_correspondents_popup").html(data);
            });
        });
    });
    
    function removeCorrespondent(elm){
        $(elm).parent().remove();
    }
</script>