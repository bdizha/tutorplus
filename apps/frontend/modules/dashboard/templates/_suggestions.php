<?php foreach ($peers as $peer): ?>
  <?php if ($peer->getId() != $profile->getId()): ?>
    <div class="suggested-peer">
      <?php include_partial('personal_info/photo', array('profile' => $peer, "dimension" => 36)) ?>
      <div class="button-box-open button-box">
        <input type="button" class="peer-open" inviteeid="<?php echo $peer->getId() ?>" value="+ Request">
      </div>  
    </div>
  <?php endif; ?>
<?php endforeach; ?>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $(".peer-accept").live("click",function(){
      var inviterId = $(this).attr("inviterid");
      $(this).addClass("peer-peered");
      $(this).removeClass("peer-accept");
      $(this).attr("value","Peers");
      $.get('/peer/accept/' + inviterId,{},function(response){
        if (response == "success") {
          // display a notice
        }
      },'html');
    });

    $(".peer-open").live("click",function(){
      var inviteeId = $(this).attr("inviteeid");
      $(this).removeClass("peer-open");
      $(this).addClass("peer-invited");

      $(this).parent().removeClass("button-box-open");
      $(this).parent().addClass("button-box-invited");

      $(this).attr("value","Invited");
      $.get('/peer/invite/' + inviteeId,{},function(response){
        if (response == "success") {
          // display a notice
        }
      },'html');
    });
  });
  //]]
</script>