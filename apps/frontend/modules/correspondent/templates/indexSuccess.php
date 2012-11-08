<?php use_helper('I18N', 'Date', 'gfMisc') ?>
<?php include_partial('common/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "correspondent", "include_bottom_block" => true, "bottom_block" => "profile/correspondents")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "My Peers" => "correspondent"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('My Peers', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">    
    <div class="content-block">
        <?php include_component("profile", "info") ?>
    </div>
    <div class="content-block">
        <div class="correspond-left-block" style="width: 560px;">
            <div class="sf_admin_show">
                <h2>My Peers</h2>
                <div id="correspondents_list">
                    <ul>
                        <li id="found_correspondent_26">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Batanayi Matuku">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Batanayi Matuku</div>
                                <a class="correspond" correspond_id="26" href="/correspondence_correspond/26">Correspond</a>
                            </div>
                        </li>
                        <li id="found_correspondent_3">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Batanayi Matuku">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Batanayi Matuku</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_6">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Blessing Mugaragumbo">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Blessing Mugaragumbo</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_10">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Brian Harvey">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Brian Harvey</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_13">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Daniel Makoni">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Daniel Makoni</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_4">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="David Cameron">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">David Cameron</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_22">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="David Mpala">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">David Mpala</div>
                                <span class="corresponded">Corresponded</span>
                            </div>
                        </li>
                        <li id="found_correspondent_7">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Emmanuel Mugaragumbo">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Emmanuel Mugaragumbo</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_9">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Enerst Muzambi">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Enerst Muzambi</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_8">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="George Bush">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">George Bush</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_20">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Innocent Puraze">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Innocent Puraze</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_11">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Kinah Muzvidziwa">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Kinah Muzvidziwa</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_12">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Kudakwashe Madzora">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Kudakwashe Madzora</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_23">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Matuku">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Matuku</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                        <li id="found_correspondent_5">
                            <div class="correspondent-image">
                                <img src="/uploads/users/6/avatar_48.png" alt="Tafadzwa Mungwazi">
                            </div>
                            <div class="correspondent-show">
                                <div class="correspondent-name">Tafadzwa Mungwazi</div>
                                <span class="invited">Invited</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="correspond-right-block" style="width: 260px;">
            <h2>Peer Requests
                <span class="actions">
                    <a href="/correspondent_correspond" class="add_correspondent">Invite</a>
                </span>
            </h2>
            <div id="requesting_correspondents_list"></div>
            <h2>Suggested Peers
                <span class="actions">
                    <a href="/correspondent_correspond" class="add_correspondent">Invite</a>
                </span>
            </h2>
            <div id="suggested_correspondents_list"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){        
        $("#suggested_correspondents_list").load("/correspondence_suggestions/none/none");
        $("#requesting_correspondents_list").load("/correspondence_requests/none/none");
        
        $("#student_correspondents_list").load("/correspondent_students");
        $("#instructor_correspondents_list").load("/correspondent_instructors");
                
        $(".add_correspondent").click(function(){
            openPopup($(this).attr("href"), '460px', "480px", "Invite correspondents");
            return false;
        });
        
        $("#tab_student_correspondents").click(function(){
            $("#heading-tabs li").attr({"class": ""});
            $(this).attr({"class": "current first"});
            $(this).css({"color": "#8A8A8A !important"});
            $("#tab_instructor_correspondents").css({"color": "#FFFFFF !important"});
            
            $("#student_correspondents_list").show();            
            $("#instructor_correspondents_list").hide();            
            $("#student_correspondents_list").load("/correspondent_students");
        });
        
        $("#tab_instructor_correspondents").click(function(){
            $("#heading-tabs li").attr({"class": ""});
            $(this).addClass("current");
            $(this).css({"color": "#8A8A8A !important"});
            $("#tab_student_correspondents").css({"color": "#FFFFFF !important"});
            
            $("#student_correspondents_list").hide();             
            $("#instructor_correspondents_list").show();
            $("#instructor_correspondents_list").load("/correspondent_instructors");
        });        
    });
</script>    

