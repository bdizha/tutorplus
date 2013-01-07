<?php if (count($books) == 0): ?>
    <span>There's currently no books added.</span>
<?php else: ?>
    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <?php echo $book->getTitle() ?> by <span class="author"><?php echo $book->getAuthor() ?></span>
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