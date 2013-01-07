<?php $i = 0; ?>
<?php foreach ($profile->getProfile()->getAwards() as $award): ?>
    <div class="award">
        <div class="image">
            <img alt="<?php echo $award->getDescription() ?>, <?php echo $award->getInstitution() ?> <?php echo $award->getYear() ?>" src="/images/small-icon.hover.png"/>
        </div>
        <div class="info">
            <div class="name"><?php echo $award->getDescription() ?></div>
            <span class="institution"><?php echo $award->getInstitution() ?></span>
        </div>
        <div class="award-year">
            <span><?php echo $award->getYear() ?></span>
        </div>
        <div class="inline-content-actions">
            <?php echo $helper->linkToAwardEdit($award, array()) ?>
            <?php echo $helper->linkToAwardDelete($award, array("confirm" => "Are you sure?")) ?>
        </div>
    </div>
    <?php $i++ ?>
<?php endforeach; ?>
<?php if ($i == 0): ?>
    <div class="no-result">No awards found.</div>
<?php endif; ?>      
<div class="clear"></div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".edit_profile_award").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Edit An Award");
            return false;
        });
  
        $(".award").hover(function(){
            $(this).children(".inline-content-actions").show();
        },
        function(){
            $(this).children(".inline-content-actions").hide();
        });
    });
    //]]
</script>