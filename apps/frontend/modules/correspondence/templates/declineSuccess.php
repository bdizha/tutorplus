<div class="correspondent-image">
    <img src="/uploads/users/6/avatar_48.png" alt="<?php echo $correspondence->getInnitiator()->getName() ?>"></img>
</div>
<div class="correspondent-show">
    <div class="correspondent-name"><?php echo $correspondence->getInnitiator()->getName() ?></div>
    <span class="declined">Declined</span>
</div>
<script type="text/javascript">
    $(document).ready(function(){     
        $("#student_correspondents_list").load("/correspondent_students");
        $("#instructor_correspondents_list").load("/correspondent_instructors");      
        $("#suggested_correspondents_list").load("/correspondence_suggestions/none/none");
        $("#requesting_correspondents_list").load("/correspondence_requests/none/none");      
    });
</script>