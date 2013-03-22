<?php if (count($interests) == 0): ?>
    <?php $key = 0; ?>
    <div class="no-result">There isn't any interests added yet.</div>
<?php else: ?>
    <ul>
        <?php foreach ($interests as $interest): ?>
            <?php $key++; ?>
            <li<?php echo ($key == count($interests)) ? ' class="last"' : "" ?>>
                <span class="icon">&nbsp;</span>
                <span class="description"><?php echo $interest->getName() ?></span>
                <div class="inline-content-actions">
                    <?php echo $helper->linkToInterestEdit($interest, array()) ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".edit_profile_interest").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Edit An Interest");
            return false;
        });
    });
  
    $("#profile_interests li").hover(function(){
        $(this).children(".inline-content-actions").show();
    },
    function(){
        $(this).children(".inline-content-actions").hide();
    });
    //]]
</script>