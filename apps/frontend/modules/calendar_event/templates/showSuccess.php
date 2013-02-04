<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getShowLinks($calendarEvent)) ?>
<?php include_partial('common/breadcrumbs', $helper->getShowBreadcrumbs($calendarEvent)) ?>
<div id="sf_admin_container">
    <div id="sf_admin_heading">
        <h3><?php echo $calendarEvent->getName() ?></h3>
    </div>
    <div id="sf_admin_content">
        <div class="content-block">     
            <h2>Event Info <span class="actions"><a id="edit_event_info" href="/calendar/event/<?php echo $calendarEvent->getId() ?>/edit">Edit</a></span></h2>
            <div class="full-block" id="event_info">
                <div class="course_info">
                    <div class="event-row">
                        <div class="row-column">
                            <span class="label">Name:</span> <?php echo $calendarEvent->getName() ?> 
                        </div>
                        <div class="row-column">
                            <span class="label">Where:</span> <?php echo $calendarEvent->getLocation() ?>
                        </div>
                    </div>
                    <div class="event-row">
                        <div class="row-column">
                            <span class="label">When:</span> <?php echo $calendarEvent->getWhen() ?>
                        </div>
                        <div class="row-column">
                            <span class="label">Organizer:</span>
                            <?php $user = $calendarEvent->getProfile() ?>
                            <?php echo link_to($user, 'profile_show', $user) ?>
                        </div>
                    </div>
                </div>        
            </div>  
        </div>
        <div class="content-block">      
            <h2>Description</h2>
            <div class="full-block">  
                <div class="event-row">
                    <?php echo $calendarEvent->getDescription() ?>  
                </div>
            </div>
        </div>
        <div class="content-block">      
            <h2>Event Attendees</h2>
            <div class="full-block" id="event_attendees">  
                <?php include_partial('calendar_event_attendee/list', array('event' => $calendarEvent)) ?>
            </div>
        </div>
        <ul class="sf_admin_actions" style="clear:both">
            <li class="sf_admin_actions_my_events">
                <?php echo $helper->linkToEvents($calendarEvent, array("label" => "< My Events")) ?>
                <?php echo $helper->linkToManageAttendees($calendarEvent, array("label" => "Manage Attendees")) ?>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){   
        // make the reply textarea elastic	
        $('textarea').redactor();     
        
        $("#calendar_event_attendees").click(function(){
            openPopup("/event/attendees/choose", '425px', "260px", "<?php echo __('Manage Attendees', Array(), 'messages') ?>");
            return false;
        }); 
    });

    function fetchEventAttendees(){
        $('#event_attendees').load("/event/attendees");
    }
</script>