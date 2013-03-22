<?php if (count($publications) == 0): ?>
    <?php $key = 0; ?>
    <div class="no-result">There isn't any publications added yet.</div>
<?php else: ?>
    <ul>
        <?php foreach ($publications as $publication): ?>
            <?php $key++; ?>
            <li<?php echo ($key == count($publications)) ? ' class="last"' : "" ?>>
                <span class="icon">&nbsp;</span>
                <span class="description"><?php echo $publication->getTitle() ?> <?php echo ($publication->getYear()) ? " - " . $publication->getYear() : "" ?></span>
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