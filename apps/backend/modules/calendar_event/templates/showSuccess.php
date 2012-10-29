<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->showLinks($calendarEvent)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->showBreadcrumbs($calendarEvent)) ?>
<?php end_slot() ?>

<div id="sf_admin_container">
    <div id="sf_admin_heading">
        <h3><?php echo $calendarEvent->getName() ?></h3>
    </div>
    <div id="sf_admin_content">
        <div class="content-block">     
            <h2>Event Info <span class="actions"><a id="edit_event_info" href="/backend.php/calendar/event/<?php echo $calendarEvent->getId() ?>/edit">Edit</a></span></h2>
            <div class="full-block" id="event_info">
                <div class="course_info">
                    <div class="even-row">
                        <div class="row-column">
                            <span class="label">Name:</span> <?php echo $calendarEvent->getName() ?> 
                        </div>
                        <div class="row-column">
                            <span class="label">Where:</span> <?php echo $calendarEvent->getLocation() ?>
                        </div>
                    </div>
                    <div class="even-row">
                        <div class="row-column">
                            <span class="label">When:</span> <?php echo $calendarEvent->getWhen() ?>
                        </div>
                        <div class="row-column">
                            <span class="label">Organizer:</span>
                            <?php $user = $calendarEvent->getUser() ?>
                            <?php echo link_to($user, 'profile_show', $user) ?>
                        </div>
                    </div>
                </div>        
            </div>  
        </div>
        <div class="content-block">      
            <h2>Description</h2>
            <div class="full-block">  
                <div class="even-row">
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
                <input type="button" class="button" onclick="document.location.href='/backend.php/calendar/event';" value="< My Events"/>
            </li>
        </ul>
    </div>
</div>