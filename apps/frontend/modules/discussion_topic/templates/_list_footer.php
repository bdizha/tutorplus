<h2>Discussion Followers</h2>
<div id="discussion_members" class="peer-block  padding-10">
    <?php include_partial('discussion_member/members', array('discussion' => $discussion)) ?>            
</div> 
<ul class="sf_admin_actions" style="clear:both">
    <li class="sf_admin_action_my_discussions">
        <?php if ($discussion->getCourseDiscussion()->getCourseId()): ?>
            <input type="button" class="button" onclick="document.location.href='/course/discussion';" value="&lt; Course Discussions" />
        <?php else: ?>
            <input type="button" class="button" onclick="document.location.href='/discussion';" value="&lt; Discussions" />
        <?php endif; ?>                
    </li>
    <li class="sf_admin_action_member_new">
        <input type="button" class="button" href="/discussion/member/new" value="+ Invite Followers" />
    </li>
    <li class="sf_admin_action_member">
        <input type="button" class="button" onclick="document.location.href='/discussion_member';" value="Manage Followers" />
    </li>
    <?php $member = $discussion->getMemberByProfileId($sf_user->getId()); ?>
    <?php if ($member): ?>
        <li class="sf_admin_action_edit_member">
            <input type="button" class="button" href="/discussion/member/<?php echo $member->getId() ?>/edit" value="Edit Membership">
        </li>
    <?php endif; ?>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_new input").click(function(){  
            openPopup("/discussion/topic/new", "605px", "605px", "New Discussion Topic");
            return false;
        });
        
        $(".discussion_topic .edit").click(function(){            
            openPopup($(this).attr("href"), "605px", "605px", "Edit Discussion Topic");
            return false;
        });
        
        $(".sf_admin_pagination li").click(function(){
            fetchContent($(this).children('a').attr("href"));
            return false;
        });
        
        $(".sf_admin_action_edit_member input").live("click", function(){
            openPopup($(this).attr("href"), '640px', '480px', 'Edit Membership');
            return false;
        });
        
        $("a#discussion_member_new").click(function(){
            openPopup("/discussion/topic/new", "600px", "", "New Discussion Topic");
            return false;
        });
    });
    
    function fetchDiscussionPeers(){
        $("#discussion_members").load("/discussion/members");
    }
</script>