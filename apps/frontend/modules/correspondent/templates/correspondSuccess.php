<?php use_helper('I18N', 'Date', 'gfMisc') ?>
<div id="sf_admin_form_container">
    <div id="sf_admin_form_content">
        <div class="sf_admin_form">
            <form id="student_correspondent_form" enctype="multipart/form-data" action="/correspondent_correspond" method="post">
                <fieldset id="sf_fieldset_none">
                    <div id="invite_correspondents">    
                        <div id="find_correspondents_left_column">
                            <label for="find_correspondents">Find correspondents:</label>
                            <input type="text" id="find_correspondents" value="<?php echo $find_correspondents ?>" name="find[correspondents]"/>
                        </div>
                        <div id="find_correspondents_right_column">
                            <input type="button" value="Search" class="save"></input>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="correspondents_list">
            <ul>
                <?php foreach ($correspondents as $id => $correspondent): ?>
                    <li id="found_correspondent_<?php echo $id ?>">
                        <div class="correspondent-image">
                            <img src="/uploads/users/6/avatar_48.png" alt="<?php echo is_array($correspondent) ? $correspondent["name"] : $correspondent ?>"></img>
                        </div>
                        <div class="correspondent-show">
                            <div class="correspondent-name"><?php echo is_array($correspondent) ? $correspondent["name"] : $correspondent ?></div>
                            <?php if (!is_array($correspondent)): ?>
                                <a class="correspond" correspond_id="<?php echo $id ?>" href="/correspondence_correspond/<?php echo $id ?>">Correspond</a>
                            <?php else: ?>
                                <?php if ($correspondent["is_request"] === true): ?>
                                    <a class="decline" decline_id="<?php echo $correspondent["id"] ?>" href="/correspondence_requests/<?php echo $correspondent["id"] ?>/2">Decline</a>
                                    <a class="accept" accept_id="<?php echo $correspondent["id"] ?>" href="/correspondence_requests/<?php echo $correspondent["id"] ?>/1">Accept request</a>
                                <?php else: ?>
                                    <span class="<?php echo strtolower(getCorrespondenceStatus($correspondent["status"])) ?>"><?php echo getCorrespondenceStatus($correspondent["status"]) ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#find_correspondents_right_column input").click(function(){ 
            $("#student_correspondent_form").ajaxSubmit(function(data){
                $("#modal-body").html(data);
            });            
            return false;
        });
        
        $(".correspond").click(function(){ 
            $("#found_correspondent_" + $(this).attr("correspond_id")).load($(this).attr("href"));
            return false;
        });
        
        $(".accept").click(function(){ 
            $("#found_correspondent_" + $(this).attr("accept_id")).load($(this).attr("href"));     
            return false;
        });
        
        $(".decline").click(function(){ 
            $("#found_correspondent_" + $(this).attr("decline_id")).load($(this).attr("href"));  
            return false;
        });
    });
</script>