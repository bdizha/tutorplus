<?php $i = 0; ?>
<?php foreach ($profile->getProfile()->getQualifications() as $qualification): ?>
    <div class="qualification">
        <div class="image">
            <img alt="<?php echo $qualification->getDescription() ?>, <?php echo $qualification->getInstitution() ?> <?php echo $qualification->getYear() ?>" src="/images/small-icon.hover.png"/>
        </div>
        <div class="info">
            <div class="name"><?php echo $qualification->getDescription() ?></div>
            <span class="institution"><?php echo $qualification->getInstitution() ?></span>
        </div>
        <div class="qualification-year">
            <span><?php echo $qualification->getYear() ?></span>
        </div>
        <div class="inline-content-actions">
            <?php echo $helper->linkToQualificationEdit($qualification, array()) ?>
            <?php echo $helper->linkToQualificationDelete($qualification, array("confirm" => "Are you sure?")) ?>
        </div>
    </div>
    <?php $i++ ?>
<?php endforeach; ?>
<?php if ($i == 0): ?>
    <div class="no-result">No qualifications found.</div>
<?php endif; ?>
<div class="clear"></div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".edit_profile_qualification").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Edit A Qualification");
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