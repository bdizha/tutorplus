<?php foreach ($course_files as $course_file): ?>
    <div style="clear:both;width:100%">
        <div class="more_link" style="float:right;padding-top:10px">
            <a class="course_file_delete" popup_url="/backend.php/file/<?php echo $course_file->getId() ?>/edit" href="/backend.php/file/<?php echo $course_file->getId() ?>/delete">Delete</a>
        </div>
        <div class="item">
            <a href="/backend.php/file/<?php echo $course_file->getId() ?>/edit">Course-Outline.pdf</a>
        </div>
    </div>
<?php endforeach; ?>
<script type='text/javascript'>
    $(document).ready(function(){
    });
</script>