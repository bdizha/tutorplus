<?php foreach ($course_reading_items as $course_reading_item): ?>
    <div class="content-row">
        <div class="course-reading-item">
            <span>
                <?php echo $course_reading_item->getTitle() ?> by
            </span>
            <span class="author"><?php echo $course_reading_item->getAuthor() ?></span>
            <span class="edit-link">
                <a class="course_reading_item_edit" popup_url="/backend.php/course_reading_item/<?php echo $course_reading_item->getId() ?>/edit" href="/backend.php/course_reading_item/<?php echo $course_reading_item->getId() ?>/edit">Edit</a>
            </span>
        </div>
    </div>
<?php endforeach; ?>
<script type='text/javascript'>
    $(document).ready(function(){        
        $(".course_reading_item_edit").click(function(){
            myModal("Edit Reading Item", $(this).attr("href"), 300, 510);
            return false;
        });     
    });
</script>