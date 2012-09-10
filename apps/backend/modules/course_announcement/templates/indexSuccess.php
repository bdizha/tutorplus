<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "course_announcement")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ "  . $course->getCode() => "course/" . $course->getId(), "Announcements" => "course_announcement"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Announcements', array(), 'messages') ?></h3>
</div>
<div class="content-block">
    <ul class="sf_admin_actions" class="clear">
        <li class="sf_admin_action_announce">
            <input type="button" class="button" value="+ Announce"/>
        </li>
        <li class="sf_admin_action_my_course">
            <input type="button" value="< My Course" class="button" onclick="document.location.href='/backend.php/course/<?php echo $course->getId() ?>';"/>
        </li>
    </ul>
    <h2>Announcements</h2>
    <div id="course_announcements">
        <?php include_partial('announcement/list', array("announcements" => $course->retrieveAnnouncements(5), "helper" => $helper, "showActions" => true)) ?>
    </div>
    <ul class="sf_admin_actions" class="clear">
        <li class="sf_admin_action_announce">
            <input type="button" class="button" value="+ Announce"/>
        </li>
        <li class="sf_admin_action_my_course">
            <input type="button" value="< My Course" class="button" onclick="document.location.href='/backend.php/course/<?php echo $course->getId() ?>';"/>
        </li>
    </ul>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#course_announcements .edit").click(function(){    
            openPopup($(this).attr("href"), '600px', '510px', "Edit Announcement:");
            return false;
        });
        
        $(".sf_admin_action_announce input").click(function(){
            openPopup('/backend.php/course_announcement/new', '600px', "500px", "<?php echo __('Add Announcement', Array(), 'messages') ?>");
            return false;
        });
    });
</script>