<?php $i = 0; ?>
<?php foreach ($profile->getAwards() as $award): ?>
    <div class="award">
        <div class="icon">
            <img src="/uploads/courses/4/48.png" class="image" alt="TutorPlus Team" title="TutorPlus Team">
        </div>
        <div class="details">
            <div class="award-row"><?php echo $award->getDescription() ?></div>
            <div class="award-row">
                <span class="label">Year:</span>
                <span class="datetime"><?php echo $award->getYear() ?></span>
            </div>
            <div class="award-row">
                <span class="label">Institution:</span>
                <span class="institution"><?php echo $award->getInstitution() ?></span>
            </div>
        </div>
        <div class="inline-content-actions">
            <?php echo $helper->linkToAwardEdit($award, array()) ?>
            <?php echo $helper->linkToAwardDelete($award, array("confirm" => "Are you sure?")) ?>
        </div>
    </div>
    <?php $i++ ?>
<?php endforeach; ?>
<?php if ($i == 0): ?>
    <div class="no-result">There isn't any awards added yet.</div>
<?php endif; ?>      
<div class="clear"></div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".edit_profile_award").click(function(){
            openPopup($(this).attr("href"),'410px',"480px","Edit An Award");
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