<div id="calendar_attendees">
    <?php include_partial('calendar_event_attendee/list', array('event' => $form->getObject())) ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){        
        $('textarea').autosize();        
        $("#calendar_event_attendees").click(function(){
            openPopup("/event_attendees_choose", '785px', "180px", "<?php echo __('Manage Attendees', Array(), 'messages') ?>");
            return false;
        }); 
    });

    function fetchEventAttendees(){
        $('#calendar_attendees').load("/event/attendees");
    }
</script>