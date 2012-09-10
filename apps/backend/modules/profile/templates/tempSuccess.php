
    <div id="profile_r_content">
        <div id="user-active-status">
            <?php echo $sf_user->getName() ?>'s an active user [<a href="#">Edit</a>]
        </div>
        <div id="profile_students">
            <span>Student Correspondents</span>
            <ul class="students">
                <?php foreach ($student_correspondents as $student_correspondent): ?>
                    <li>
                        <div>
                            <img alt="<?php echo $student_correspondent->getCorrespondent() ?>" title="<?php echo $student_correspondent->getCorrespondent() ?>" src="/uploads/users/<?php echo $student_correspondent->getCorrespondentId() ?>/normal-24.jpg" class="profile-avator"/>
                            <div class="user_name"><a href="/backend.php/profile"><?php echo $student_correspondent->getCorrespondent() ?></a></div>
                        </div>
                    </li>                
                <?php endforeach; ?>
            </ul>
            <div class="view-all view_all_correspondents">
                <a href="/backend.php/correspondence/correspondents">View all</a>
            </div>
        </div>
        <div id="profile_instructors">
            <span>Instructor Correspondents</span>
            <ul class="students">
                <?php foreach ($instructor_correspondents as $instructor_correspondent): ?>
                    <li>
                        <div>
                            <img alt="<?php echo $instructor_correspondent->getCorrespondent() ?>" title="<?php echo $instructor_correspondent->getCorrespondent() ?>" src="/uploads/users/<?php echo $instructor_correspondent->getCorrespondentId() ?>/normal-24.jpg" class="profile-avator"/>
                            <div class="user_name"><a href="/backend.php/profile"><?php echo $instructor_correspondent->getCorrespondent() ?></a></div>
                        </div>
                    </li>                
                <?php endforeach; ?>
            </ul>
            <div class="view-all view_all_correspondents">
                <a href="/backend.php/correspondence/correspondents">View all</a>
            </div>
        </div>
        <div id="invite_correspondents">
            <span>Invite Correspondents</span>
            <ul style="clear:both" class="sf_admin_actions">
                <li>
                    <input id="invite_correspondence" type="button" value="+ Invite Correspondents">
                </li>
            </ul>
        </div>
        <?php if (count($correspondence_suggestions) > 0): ?>
            <div id="profile_suggestions">
                <span>Correspondent Suggestions</span>
                <ul class="suggestions">
                    <?php foreach ($correspondence_suggestions as $correspondence_suggestion): ?>
                        <li>
                            <div>
                                <div class="suggestion-image">
                                    <img alt="<?php echo $correspondence_suggestion['first_name'] . ' ' . $correspondence_suggestion['last_name'] ?>" src="/uploads/users/<?php echo $correspondence_suggestion['id'] ?>/normal-36.jpg" class="profile-avator"/>
                                </div>
                                <div class="suggestion-request">
                                    <?php echo $correspondence_suggestion['first_name'] . ' ' . $correspondence_suggestion['last_name'] ?><br />
                                    <input id="<?php echo $correspondence_suggestion['id'] ?>" type="button" value="Send request"/>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="view-all">
                    <a href="#">Show all</a>
                </div>
            </div>
        <?php endif; ?>
    </div>



    $(document).ready(function(){
        
        $(".suggestion-request input").click(function(){
            $("#profile_suggestions").load('/backend.php/correspondence_request/' + this.id);
        });
        
        fetchDefaultTab();
        
        setDialog("My correspondents", "view_all_correspondents_popup", 750);
        
        setDialog("Invite Correspondents to join you on ecollege+", "invite_correspondents_popup", 500);
    
        $(".tabs").live("click", function(){
            $(".tabs").removeClass("active");
            $(this).addClass("active");
            $("#tab_content").load('/backend.php/' + this.id);
            return false;
        });        
           
        $("#invite_correspondence").click(function(){            
            $("#invite_correspondents_popup").load("/backend.php/correspondence");
            $("#invite_correspondents_popup").dialog("open");
        });      
           
        $(".view_all_correspondents a").click(function(){            
            $("#view_all_correspondents_popup").load("/backend.php/correspondence/correspondents");
            $("#view_all_correspondents_popup").dialog("open");
            return false;
        });
    });
    
    function setDialog(title, element_id, width){		
        $("#" + element_id).dialog({
            modal:true,
            title: title,
            autoOpen:false,
            buttons:{"Done":function(){
                    $(this).dialog('close');
                },
                "+ Invite":function(){
                    $("#invite_correspondents_form").ajaxSubmit(function(data){
                        $("#" + element_id).html(data);
                    });
                }
            },
            top: 40,
            position:'center',
            minHeight:200,
            width: width,
            resizable:true,
            draggable:true
        });
    }

    function fetchDefaultTab()
    {
        $("#tab_content").load('/backend.php/bulletin_board_tab');
    }