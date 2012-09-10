<?php use_helper('I18N', 'Date') ?>
<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "course_discussion")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ "  . $course->getCode() => "course/" . $course->getId(), "Discussions" => "course_discussion", "Discussion ~ " . $discussion->getName() => "discussion/" . $discussion->getId()))) ?>
<?php end_slot() ?>
<script type="text/javascript">
    $(document).ready(function(){			
        fetchContent('/backend.php/discussion_topic');
    });
</script>