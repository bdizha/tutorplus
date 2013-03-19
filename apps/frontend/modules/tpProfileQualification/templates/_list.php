<?php $i = 0; ?>
<?php foreach ($profile->getQualifications() as $qualification): ?>
    <div class="qualification">
        <div class="icon">
            <img src="/uploads/courses/2/48.png" class="image" alt="TutorPlus Team" title="TutorPlus Team">
        </div>
        <div class="details">
            <div class="qualification-row"><?php echo $qualification->getDescription() ?></div>
            <div class="qualification-row">
                <span class="label">Year:</span>
                <span class="datetime"><?php echo $qualification->getYear() ?></span>
            </div>
            <div class="qualification-row">
                <span class="label">Institution:</span>
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
    <div class="no-result">There isn't any qualifications added yet.</div>
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