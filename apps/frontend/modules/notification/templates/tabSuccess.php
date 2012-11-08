<div class="sf_admin_show">
    <div class="content">
        <div class="profile_notice">Naturally, you will receive all high priority notifications via email. Set low priority notifications below. </div>
        <h2>Messages</h2>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">  
            <div>
                <label for="course_name">Email me when</label>
                <div class="input ">
                    <ul class="checkbox_list">            
                        <li>
                            <input type="checkbox" value="1" name="notification[send_direct_message]" id="notification_send_direct_message" checked="checked"><input type="hidden" value="0" name="user[send_new_direct_text_email]">
                            <label for="notification_send_direct_message">
                                I'm sent a direct message
                            </label>
                        </li>            
                        <li>
                            <input type="checkbox" value="2" name="notification[send_reply_email]" id="notification_send_reply_email" checked="checked"><input type="hidden" value="0" name="user[send_mention_email]">
                            <label for="notification_send_reply_email">
                                I'm sent a reply or mentioned
                            </label>
                        </li>            
                    </ul>
                </div>
            </div>
        </div>
        <br style="clear: both;">
        <h2>Activities</h2>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
            <div>
                <label for="course_name">Email me when</label>
                <div class="input ">
                    <ul class="checkbox_list">            
                        <li>
                            <input type="checkbox" value="1" name="notification[followed_someone_new]" id="notification_followed_someone_new" checked="checked"><input type="hidden" value="0" name="user[send_new_friend_email]">
                            <label for="notification_followed_someone_new">
                                I'm followed by someone new
                            </label>
                        </li>            
                        <li>
                            <input type="checkbox" value="2" name="notification[send_favorited_email]" id="notification_send_favorited_email" checked="checked"><input type="hidden" value="0" name="user[send_favorited_email]">
                            <label for="notification_send_favorited_email">
                                My bulletin post has been commented
                            </label>
                        </li>            
                        <li>
                            <input type="checkbox" value="2" name="notification[my_discussion_group]" id="notification_my_discussion_group" checked="checked">
                            <label for="notification_my_discussion_group">
                                My discussion groups/topic are updated
                            </label>
                        </li>           
                        <li>
                            <input type="checkbox" value="2" name="notification[course_material]" id="notification_course_material" checked="checked">
                            <label for="notification_course_material">
                                There's any course material changes/uploads
                            </label>
                        </li>           
                        <li>
                            <input type="checkbox" value="2" name="notification[assignments_due]" id="notification_assignments_due" checked="checked">
                            <label for="notification_assignments_due">
                                Assignments are due for submissions
                            </label>
                        </li>           
                    </ul>
                </div>
            </div>
        </div>
        <br style="clear: both;">
        <h2>Updates</h2>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
            <div>
                <label for="course_name">Notify me when</label>
                <div class="input ">
                    <ul class="checkbox_list">
                        <li>
                            <input type="checkbox" value="1" name="notification[system_changes]" id="notification_system_changes" checked="checked">
                            <label for="notification_system_changes">
                                New changes are made to the eCollegePlus system features
                            </label>
                        </li>            
                        <li>
                            <input type="checkbox" value="1" name="notification[system_maintenance]" id="notification_system_maintenance" checked="checked">
                            <label for="notification_system_maintenance">
                                System is down for maintenance purposes
                            </label>
                        </li>            
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<ul style="clear: both;" class="sf_admin_actions">
    <li class="sf_admin_action_new">
        <input type="button" value="Save">
    </li>
</ul>