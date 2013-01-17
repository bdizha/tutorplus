<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs($discussion)) ?>
<div class="sf_admin_heading">
  <h3>Discussion ~ <?php echo $discussion->getName() ?></h3>
</div>
<div id="sf_admin_content">
  <div class="content-block">
    <div class="top-actions">
      <?php echo $helper->linkToInvitePeers() ?>
    </div>
    <div class="discussion-left-block">
      <div class="full-block">
        <h2>By <?php echo link_to($discussion->getProfile(), 'profile_show', $discussion->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussion->getUpdatedAt()) ?></span> - <a href="/discussion/topic/<?php echo $discussion->getSlug() ?>"><?php echo $discussion->getNbTopics() ?> topics of <?php echo $discussion->getNbTopics() ?> followers</a></h2>
        <div class="discussion-row"><?php echo $discussion->getDescription() ?></div>                
      </div>
      <ul class="sf_admin_actions" style="clear:both">
        <li class="sf_admin_action_my_timeline">
          <?php if ($discussion->getCourseDiscussion()->getCourseId()): ?>
            <?php echo $helper->linkToCourseDiscussion() ?>
          <?php else: ?>
            <?php echo $helper->linkToDiscussions() ?>
          <?php endif; ?>
        </li>
        <li class="sf_admin_action_member">
          <?php echo $helper->linkToManagePeers($discussion) ?>
        </li>
        <?php $member = $discussion->getMemberByProfileId($sf_user->getId()); ?>
        <?php if ($member): ?>
          <li class="sf_admin_action_edit_member">
            <?php echo $helper->linkToEditMembership($member->getId()) ?>
          </li>
          <li class="sf_admin_action_new_topic">
            <?php echo $helper->linkToNewTopic() ?>
          </li>
        <?php else: ?>
          <li class="sf_admin_action_join_discussion">
            <?php echo $helper->linkToJoinDiscussion() ?>
          </li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="discussion-right-block">
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
    <div class="discussion-left-block">
      <h2>Discussion Topics - <?php echo $discussion->getTopics()->count(); ?> topic(s)</h2>
      <?php include_partial('discussion_topic/list', array('discussionTopics' => $discussion->getTopics(), 'helper' => $helper)) ?>
      <ul class="sf_admin_actions" style="clear:both">
        <li class="sf_admin_action_new_topic">
          <?php echo $helper->linkToNewTopic() ?>
        </li>
      </ul>
    </div>
    <div class="discussion-right-block">
      <h2>Discussion Peers</h2>
      <div id="discussion-followers">
        <?php $members = $discussion->retrieveMembers(); ?>
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
      openPopup("/discussion/topic/new","605px","605px","New Discussion Topic");
      return false;
    });

    $(".discussion_topic .button-edit").click(function(){
      openPopup($(this).attr("href"),"605px","605px","Edit Discussion Topic");
      return false;
    });

    $("#invite_follower ").click(function(){
      openPopup($(this).attr("href"),'556px','556px','+ Invite Discussion Peers');
      return false;
    });

    $(".peer-actions .invite").click(function(){
      var ProfileId = $(this).attr("ProfileId");
      $.get('/discussion/peer/accept/' + ProfileId,{},function(response){
        $("#discussion-notice").html(response);
        $(".notice").hide();
        $("#discussion-notice").show();
        setTimeout(function(){
          $(".notice").hide();
        },3000);
        $("#suggested-followers").load("/discussion/peer/suggested");
      },'html');
    });

    $(".discussion_topic").hover(function(){
      $(this).children(".discussion-actions").show();
    },
        function(){
          $(this).children(".discussion-actions").hide();
        });
  });

  function fetchDiscussionTopics(){
    window.location = window.location.href;
  }
  //]]
</script>