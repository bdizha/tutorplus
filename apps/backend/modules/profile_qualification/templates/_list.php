<?php $i = 0; ?>
<?php foreach ($profile->getUser()->getQualifications() as $qualification): ?>
    <div class="qualification <?php echo fmod($i, 2) ? "odd" : "even" ?>-background">
        <div class="image">
            <img alt="<?php echo $qualification->getDescription() ?>, <?php echo $qualification->getInstitution() ?> <?php echo $qualification->getYear() ?>" src="/images/small-icon.hover.png"/>
        </div>
        <div class="info">
            <div class="name"><?php echo $qualification->getDescription() ?></div>
            <span class="institution"><?php echo $qualification->getInstitution() ?></span>
        </div>
        <div class="qualification-year">
            <span><?php echo $qualification->getYear() ?></span>
        </div>
    </div>
    <?php $i++ ?>
<?php endforeach; ?>
<?php if ($i == 0): ?>
    <div class="no-result">No qualifications found.</div>
<?php endif; ?>
<div class="clear"></div>
<script type="text/javascript">      
    $("#qualifications_list li").mouseover(function(){
        $(this).children(".inline-actions").show();
    }).mouseout(function(){
        $(this).children(".inline-actions").hide();
    });
    
    $(".edit-qualification").click(function(){
        myModal("Edit qualification", $(this).attr("href"), 200, 510);
        return false;
    });
</script>