<?php use_helper('I18N', 'Date') ?>
<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics_instructor", "item_level_2" => "instructor_details", "current_route" => "instructor_academic_settings")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "instructor", "Instructors" => "instructor", __('Edit Academic Details ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $instructor->getFirstName(), '%%last_name%%' => $instructor->getLastName()), 'messages') => "instructor_academic_settings/" . $instructor->getId() . "/"))) ?>
<?php end_slot() ?>

<?php include_partial('instructor_academic_settings/flashes', array('form' => $form)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Edit Academic Details ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $instructor->getFirstName(), '%%last_name%%' => $instructor->getLastName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <ul class="sf_admin_actions" style="clear:both">
            <li class="academic_setting">
                <input type="button" class="button" title="Manage Instructor Courses" popupurl="<?php echo url_for2('choose_course', array("module_name" => "instructor", "object_id" => $instructor->getId())) ?>" value="Manage Courses" />
            </li>
            <li class="academic_setting">
                <input type="button" class="button" title="Manage Instructor Mailing Lists" popupurl="<?php echo url_for2('choose_mailing_list', array("module_name" => "instructor", "object_id" => $instructor->getId())) ?>" value="Manage Mailing Lists" />
            </li>
        </ul>
        <div class="sf_admin_show">
            <h2>Courses</h2>
            <div id="courses_list">
                <?php include_partial('course/courses', array('courses' => $instructor->getCourses())) ?>
            </div>
            <h2>Mailing Lists</h2>
            <div id="mailing_lists_list">
                <?php include_partial('mailing_list/mailing_lists', array('mailingLists' => $instructor->getMailingLists())) ?>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".academic_setting input").click(function(){
            openPopup($(this).attr("popupurl"), '700px', "480px", $(this).attr("title"));
            return false;
        });
    });
    
    function fetchCourses(){
        $('#courses_list').load("<?php echo url_for('instructor_courses') ?>");
    }

    function fetchMailingLists(){
        $('#mailing_lists_list').load("<?php echo url_for('instructor_mailing_lists') ?>");
    }
</script>