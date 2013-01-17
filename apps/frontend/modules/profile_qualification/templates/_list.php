<?php $i = 0; ?>
<?php foreach ($profile->getQualifications() as $qualification): ?>
  <div class="qualification">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 96)) ?>
      <div class="name"><?php echo $qualification->getDescription() ?></div>
    </div>
    <div class="body">
      <div class="qualification-info">
        Year: 
        <span class="datetime">
          <?php echo $qualification->getYear() ?>  
        </span>
      </div>
      <div class="course-info">
        Institution:
        <span class="institution"><?php echo $qualification->getInstitution() ?></span>
      </div>
    </div>
    <div class="inline-content-actions">
      <?php echo $helper->linkToQualificationEdit($qualification, array()) ?>
      <?php echo $helper->linkToQualificationDelete($qualification, array("confirm" => "Are you sure?")) ?>
    </div>
  </div>
  <?php $i++ ?>
<?php endforeach; ?>
<?php if ($i == 0): ?>
  <div class="no-result">There's no qualifications added yet.</div>
<?php endif; ?>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $(".edit_profile_qualification").click(function(){
      openPopup($(this).attr("href"),'410px',"480px","Edit A Qualification");
      return false;
    });

    $(".qualification").hover(function(){
      $(this).children(".inline-content-actions").show();
    },
        function(){
          $(this).children(".inline-content-actions").hide();
        });
  });
  //]]
</script>