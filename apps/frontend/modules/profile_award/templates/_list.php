<?php $i = 0; ?>
<?php foreach ($profile->getUser()->getAwards() as $award): ?>
    <div class="award <?php echo fmod($i, 2) ? "odd" : "even" ?>-background">
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
    </div>
    <?php $i++ ?>
<?php endforeach; ?>
<?php if ($i == 0): ?>
    <div class="no-result">No awards found.</div>
<?php endif; ?>      
<div class="clear"></div>
<script type="text/javascript">      
    $("#awards_list li").mouseover(function(){
        $(this).children(".inline-actions").show();
    }).mouseout(function(){
        $(this).children(".inline-actions").hide();
    });
    
    $(".edit-award").click(function(){
        myModal("Edit Award", $(this).attr("href"), 200, 510);
        return false;
    });
</script>