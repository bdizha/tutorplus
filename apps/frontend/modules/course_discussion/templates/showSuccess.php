<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs($discussionGroup)) ?>
<div class="sf_admin_heading">
  <h3>Discussion ~ <?php echo $discussionGroup->getName() ?></h3>
</div>
<div id="sf_admin_content">
  <div class="content-block">
    <div class="top-actions">
      <?php echo $helper->linkToInvitePeers() ?>
    </div>
    <div class="discussion-group-left-block">
      <div class="full-block">
        <h2>By <?php echo link_to($discussionGroup->getProfile(), 'profile_show', $discussionGroup->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionGroup->getCreatedAt()) ?></span> - <a href="/discussion/topic/<?php echo $discussionGroup->getSlug() ?>"><?php echo $discussionGroup->getNbTopics() ?> topics of <?php echo $discussionGroup->getNbTopics() ?> followers</a></h2>
        <div class="discussion-group-row"><?php echo $discussionGroup->getDescription() ?></div>                
      </div>
      <ul class="sf_admin_actions" style="clear:both">
        <li class="sf_admin_action_my_timeline">
          <?php if ($discussionGroup->getCourseDiscussionGroup()->getCourseId()): ?>
            <?php echo $helper->linkToCourseDiscussionGroup() ?>
          <?php else: ?>
            <?php echo $helper->linkToDiscussionGroups() ?>
          <?php endif; ?>
        </li>
        <li class="sf_admin_action_member">
          <?php echo $helper->linkToManagePeers($discussionGroup) ?>
        </li>
        <?php $member = $discussionGroup->getMemberByProfileId($sf_user->getId()); ?>
        <?php if ($member): ?>
          <li class="sf_admin_action_edit_member">
            <?php echo $helper->linkToEditMembership($member->getId()) ?>
          </li>
          <li class="sf_admin_action_new_topic">
            <?php echo $helper->linkToNewTopic() ?>
          </li>
        <?php else: ?>
          <li class="sf_admin_action_join_discussion_group">
            <?php echo $helper->linkToJoinDiscussionGroup() ?>
          </li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="discussion-group-right-block">
      <h2>Suggested Peers</h2>
      <div id="suggested-followers">
        <?php if (count($suggestedPeers) > 0): ?>
          <?php foreach ($suggestedPeers as $suggestedPeer): ?>
            <div class="follower"> 
              <?php include_partial('personal_info/photo', array('profile' => $suggestedPeer, "dimension" => 48)) ?>
              <div class="name"><?php echo link_to($suggestedPeer->getName(), 'profile_show', $suggestedPeer) ?></div>
              <div class="button-box-blue">
                <input class="invite" ProfileId="<?php echo $suggestedPeer->getId() ?>" value="+ Invite" type="button">
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="no-result">There's no followers to suggest.</div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="content-block">
    <div class="discussion-group-left-block">
      <h2>Topics - <?php echo $discussionGroup->getTopics()->count(); ?> topic(s)</h2>
      <?php include_partial('discussion_topic/list', array('DiscussionTopics' => $discussionGroup->getTopics(), 'helper' => $helper)) ?>
      <ul class="sf_admin_actions" style="clear:both">
        <li class="sf_admin_action_new_topic">
          <?php echo $helper->linkToNewTopic() ?>
        </li>
      </ul>
    </div>
    <div class="discussion-group-right-block">
      <h2>Peers</h2>
      <div id="discussion-group-followers">
        <?php $members = $discussionGroup->retrieveMembers(); ?>
        <?php if ($members->count() > 0): ?>
          <?php foreach ($members as $member): ?>
            <div class="participant">
              <?php include_partial('personal_info/photo', array('profile' => $member->getProfile(), "dimension" => 36)) ?>
            </div>  
          <?php endforeach; ?>
          <div class="clear">&nbsp;</div>
        <?php else: ?>
          <div class="no-result">There's no followers.</div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $(".sf_admin_action_new_topic input").click(function(){
      openPopup("/discussion/topic/new","605px","605px","New DiscussionGroup Topic");
      return false;
    });

    $(".discussion_topic .button-edit").click(function(){
      openPopup($(this).attr("href"),"605px","605px","Edit DiscussionGroup Topic");
      return false;
    });

    $("#invite_follower ").click(function(){
      openPopup($(this).attr("href"),'556px','556px','+ Invite DiscussionGroup Peers');
      return false;
    });

    $(".peer-actions .invite").click(function(){
      var ProfileId = $(this).attr("ProfileId");
      $.get('/discussion/peer/accept/' + ProfileId,{},function(response){
        $("#discussion-group-notice").html(response);
        $(".notice").hide();
        $("#discussion-group-notice").show();
        setTimeout(function(){
          $(".notice").hide();
        },3000);
        $("#suggested-followers").load("/discussion/peer/suggested");
      },'html');
    });

    $(".discussion_topic").hover(function(){
      $(this).children(".discussion-group-actions").show();
    },
        function(){
          $(this).children(".discussion-group-actions").hide();
        });
  });

  function fetchDiscussionTopics(){
    window.location = window.location.href;
  }
  //]]
</script>