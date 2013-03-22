<?php $key = 0; ?>
<ul>
    <?php foreach ($profile->getAwards() as $award): ?>
        <?php $key++; ?>
        <li class="award<?php echo ($key == $profile->getAwards()->count()) ? ' last' : "" ?>">
            <span class="icon">&nbsp;</span>
            <div class="body">
                <span class="description"><?php echo $award->getDescription() ?>,</span>
                <span class="datetime"><?php echo $award->getYear() ?>,</span>
                <span class="institution"><?php echo $award->getInstitution() ?></span>                    
            </div>
            <div class="inline-content-actions">
                <?php echo $helper->linkToAwardEdit($award, array()) ?>
                <?php echo $helper->linkToAwardDelete($award, array("confirm" => "Are you sure?")) ?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<?php if ($key == 0): ?>
    There isn't any awards added yet.
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