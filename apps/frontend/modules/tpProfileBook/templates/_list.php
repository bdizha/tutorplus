<?php if (count($books) == 0): ?>
    <?php $key = 0; ?>
    <div class="no-result">There isn't any favourite books added yet.</div>
<?php else: ?>
    <ul>
        <?php foreach ($books as $book): ?>
            <?php $key++; ?>
            <li<?php echo ($key == count($books)) ? ' class="last"' : "" ?>>
                <span class="icon">&nbsp;</span>
                <span class="description"><?php echo $book->getTitle() ?> by</span>
                <span class="author"><?php echo $book->getAuthor() ?></span>
                <div class="inline-content-actions">
                    <?php echo $helper->linkToBookEdit($book, array()) ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".edit_profile_book").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Edit A Book");
            return false;
        });
    });
  
    $("#profile_books li").hover(function(){
        $(this).children(".inline-content-actions").show();
    },
    function(){
        $(this).children(".inline-content-actions").hide();
    });
    //]]
</script>