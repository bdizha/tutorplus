<?php if (count($publications) == 0): ?>
    <span>There's currently no publications added.</span>
<?php else: ?>
    <ul>
        <?php foreach ($publications as $publication): ?>
            <li>
                <?php echo $publication->getTitle() ?> <?php echo ($publication->getYear()) ? " - " . $publication->getYear() : "" ?>
                <div class="inline-content-actions">
                    <?php echo $helper->linkToPublicationEdit($publication, array()) ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".edit_profile_publication").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Edit A Publication");
            return false;
        });
    });
  
    $("#profile_publications li").hover(function(){
        $(this).children(".inline-content-actions").show();
    },
    function(){
        $(this).children(".inline-content-actions").hide();
    });
    //]]
</script>