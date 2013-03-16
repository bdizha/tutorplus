<h2>Discussion Peers</h2>
<div id="discussion_peers" class="tab-block  padding-10">
    <?php include_partial('tpDiscussion_peer/members', array('discussion' => $discussion)) ?>            
</div> 
<ul class="sf_admin_actions" style="clear:both">
    <li class="sf_admin_action_my_Discussions">
        <?php if ($discussion->getCourseDiscussion()->getCourseId()): ?>
            <input type="button" class="button" onclick="document.location.href='/course/Discussion';" value="&lt; Course Discussions" />
        <?php else: ?>
            <input type="button" class="button" onclick="document.location.href='/Discussion';" value="&lt; Discussions" />
        <?php endif; ?>                
    </li>
    <li class="sf_admin_action_member_new">
        <input type="button" class="button" href="/discussion/peer/new" value="+ Invite Peers" />
    </li>
    <li class="sf_admin_action_member">
        <input type="button" class="button" onclick="document.location.href='/discussion/peer';" value="Manage Peers" />
    </li>
    <?php $member = $discussion->getMemberByProfileId($sf_user->getId()); ?>
    <?php if ($member): ?>
        <li class="sf_admin_action_edit_member">
            <input type="button" class="button" href="/discussion/peer/<?php echo $member->getId() ?>/edit" value="Edit Membership">
        </li>
    <?php endif; ?>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){        
        $(".sf_admin_pagination li").click(function(){
            fetchContent($(this).children('a').attr("href"));
            return false;
        });
        
        $(".sf_admin_action_edit_member input").live("click", function(){
            openPopup($(this).attr("href"), '640px', '480px', 'Edit Membership');
            return false;
        });
    });
    
    function fetchDiscussionPeers(){
        $("#discussion_peers").load("/discussion/peers");
    }
</script>