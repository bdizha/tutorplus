<?php if (count($requested_correspondences) > 0): ?>
    <ul>
        <?php foreach ($requested_correspondences as $correspondence): ?>
            <li id="requesting_correspondent_<?php echo $correspondence->getInnitiatorId() ?>">
                <div class="correspondent-image">
                    <img src="/uploads/users/6/avatar_48.png" alt="<?php echo $correspondence->getInnitiator()->getName() ?>"></img>
                </div>
                <div class="correspondent-show">
                    <div class="correspondent-name">
                        <?php echo $correspondence->getInnitiator()->getName() ?>
                    </div>
                    <a class="decline" decline_id="<?php echo $correspondence->getInnitiatorId() ?>" href="/backend.php/correspondence_requests/<?php echo $correspondence->getInnitiatorId() ?>/2">Decline</a>
                    <a class="accept" accept_id="<?php echo $correspondence->getInnitiatorId() ?>" href="/backend.php/correspondence_requests/<?php echo $correspondence->getInnitiatorId() ?>/1">Accept request</a>
                </div>
            </li>
        <?php endforeach; ?>
        <div class="clear"></div>
    </ul>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function(){ 
<?php if ($correspondence_status != "none"): ?>        
            $("#student_correspondents_list").load("/backend.php/correspondent_students");
            $("#instructor_correspondents_list").load("/backend.php/correspondent_instructors");
<?php endif; ?>
        $("#requesting_correspondents_list .accept").click(function(){ 
            $("#requesting_correspondents_list").load($(this).attr("href"));
            return false;
        });
                                
        $("#requesting_correspondents_list .decline").click(function(){ 
            $("#requesting_correspondents_list").load($(this).attr("href"));  
            return false;
        });       
    });
</script>