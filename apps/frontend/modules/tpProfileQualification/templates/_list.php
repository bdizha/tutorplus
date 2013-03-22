<?php $key = 0; ?>
<?php foreach ($profile->getQualifications() as $qualification): ?>
    <ul>
        <?php foreach ($profile->getQualifications() as $qualification): ?>
            <?php $key++; ?>
            <li class="qualification<?php echo ($key == $profile->getQualifications()->count()) ? ' last' : "" ?>">
                <span class="icon">&nbsp;</span>
                <div class="body">
                    <span class="description"><?php echo $qualification->getDescription() ?>,</span>
                    <span class="datetime"><?php echo $qualification->getYear() ?>,</span>
                    <span class="institution"><?php echo $qualification->getInstitution() ?></span>                    
                </div>
                <div class="inline-content-actions">
                    <?php echo $helper->linkToQualificationEdit($qualification, array()) ?>
                    <?php echo $helper->linkToQualificationDelete($qualification, array("confirm" => "Are you sure?")) ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>
<?php if ($key == 0): ?>
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