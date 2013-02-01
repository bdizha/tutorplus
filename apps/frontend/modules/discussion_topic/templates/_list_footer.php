<h2>Discussion Peers</h2>
<div id="discussion_peers" class="peer-block  padding-10">
    <?php include_partial('discussion_peer/members', array('discussionGroup' => $discussionGroup)) ?>            
</div> 
<ul class="sf_admin_actions" style="clear:both">
    <li class="sf_admin_action_my_DiscussionGroups">
        <?php if ($discussionGroup->getCourseDiscussionGroup()->getCourseId()): ?>
            <input type="button" class="button" onclick="document.location.href='/course/DiscussionGroup';" value="&lt; Course DiscussionGroups" />
        <?php else: ?>
            <input type="button" class="button" onclick="document.location.href='/DiscussionGroup';" value="&lt; DiscussionGroups" />
        <?php endif; ?>                
    </li>
    <li class="sf_admin_action_member_new">
        <input type="button" class="button" href="/discussion/peer/new" value="+ Invite Peers" />
    </li>
    <li class="sf_admin_action_member">
        <input type="button" class="button" onclick="document.location.href='/discussion/peer';" value="Manage Peers" />
    </li>
    <?php $member = $discussionGroup->getMemberByProfileId($sf_user->getId()); ?>
    <?php if ($member): ?>
        <li class="sf_admin_action_edit_member">
            <input type="button" class="button" href="/discussion/peer/<?php echo $member->getId() ?>/edit" value="Edit Membership">
        </li>
    <?php endif; ?>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_new input").click(function(){  
            openPopup("/discussion/topic/new", "605px", "605px", "New DiscussionGroup Topic");
            return false;
        });
        
        $(".discussion_topic .edit").click(function(){            
            openPopup($(this).attr("href"), "605px", "605px", "Edit DiscussionGroup Topic");
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
        
        $("a#discussion_peer_new").click(function(){
            openPopup("/discussion/topic/new", "600px", "", "New DiscussionGroup Topic");
            return false;
        });
    });
    
    function fetchDiscussionPeers(){
        $("#discussion_peers").load("/discussion/peers");
    }
</script>