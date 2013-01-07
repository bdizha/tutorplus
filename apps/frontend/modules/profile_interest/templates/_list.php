<?php if (count($interests) == 0): ?>
    <span>There's currently no interests added.</span>
<?php else: ?>
    <ul>
        <?php foreach ($interests as $interest): ?>
            <li>
                <?php echo $interest->getName() ?>
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