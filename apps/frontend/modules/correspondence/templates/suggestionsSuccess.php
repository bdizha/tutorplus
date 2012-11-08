<?php if (count($correspondence_suggestions) > 0): ?>
    <ul>
        <?php foreach ($correspondence_suggestions as $correspondence_suggestion): ?>
            <li id="suggested_correspondent_<?php echo $correspondence_suggestion['id'] ?>">
                <div class="correspondent-image">
                    <img src="/uploads/users/6/avatar_48.png" alt="<?php echo $correspondence_suggestion['first_name'].' '.$correspondence_suggestion['last_name'] ?>"></img>
                </div>
                <div class="correspondent-show">
                    <div class="correspondent-name">
                        <?php echo $correspondence_suggestion['first_name'].' '.$correspondence_suggestion['last_name'] ?>
                    </div>
                    <a class="decline" decline_id="<?php echo $correspondence_suggestion['id'] ?>" href="/correspondence_suggestions/<?php echo $correspondence_suggestion['id'] ?>/2">Decline</a>
                    <a class="accept" accept_id="<?php echo $correspondence_suggestion['id'] ?>" href="/correspondence_suggestions/<?php echo $correspondence_suggestion['id'] ?>/0">Add correspondent</a>
                </div>
            </li>
        <?php endforeach; ?>
        <div class="clear"></div>
    </ul>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function(){
<?php if ($correspondence_status != "none"): ?>        
            $("#student_correspondents_list").load("/correspondent_students");
            $("#instructor_correspondents_list").load("/correspondent_instructors");
<?php endif; ?>             
        $("#suggested_correspondents_list .accept").click(function(){ 
            $("#suggested_correspondents_list").load($(this).attr("href"));    
            return false;
        });
                        
        $("#suggested_correspondents_list .decline").click(function(){
            $("#suggested_correspondents_list").load($(this).attr("href"));
            return false;
        });       
    });
</script>