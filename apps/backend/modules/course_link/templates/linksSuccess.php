<?php use_helper('I18N', 'Date') ?>
<?php foreach ($course_links as $course_link): ?>
    <div class="content-row">
        <div class="course-link">
            <span>
                <a href="<?php echo $course_link->getUrl() ?>" target="_blank"><?php echo $course_link->getName() ?></a>
            </span>
            <span class="edit-link">
                <a class="edit_course_link" href="/backend.php/course_link/<?php echo $course_link->getId() ?>/edit">Edit</a>
            </span>
        </div>
    </div>
<?php endforeach; ?>
<script type='text/javascript'>
    $(document).ready(function(){        
        $(".edit_course_link").click(function(){
            myModal("Edit Course Link", $(this).attr("href"), 300, 510);
            return false;
        });     
    });
</script>