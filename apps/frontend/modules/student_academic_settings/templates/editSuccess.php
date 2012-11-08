<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->editLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->editBreadcrumbs($student)) ?>
<?php end_slot() ?>

<?php include_partial('student_academic_settings/flashes', array('form' => $form)) ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Edit Academic Details ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $student->getFirstName(), '%%last_name%%' => $student->getLastName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <ul class="sf_admin_actions" style="clear:both">
            <li class="academic_setting">
                <input type="button" class="button" title="Manage Student Programmes" popupurl="<?php echo url_for2('choose_program', array("module_name" => "student", "object_id" => $student->getId())) ?>" value="Manage Programmes" />
            </li>
            <li class="academic_setting">
                <input type="button" class="button" title="Manage Student Courses" popupurl="<?php echo url_for2('choose_course', array("module_name" => "student", "object_id" => $student->getId())) ?>" value="Manage Courses" />
            </li>
            <li class="academic_setting">
                <input type="button" class="button" title="Manage Student Mailing Lists" popupurl="<?php echo url_for2('choose_mailing_list', array("module_name" => "student", "object_id" => $student->getId())) ?>" value="Manage Mailing Lists" />
            </li>
        </ul>
        <div class="content-block">
            <h2>Programmes</h2>
            <div class="full-block" id="programmes_list">    
                <?php include_partial('student/programmes', array('programmes' => $student->getProgrammes())) ?>
            </div>
        </div>
        <div class="content-block">
            <h2>Courses</h2>
            <div class="full-block" id="courses_list">   
                <?php include_partial('student/courses', array('courses' => $student->getCourses())) ?>
            </div>
        </div>
        <div class="content-block">
            <h2>Mailing Lists</h2>
            <div class="full-block" id="mailing_lists_list">    
                <?php include_partial('student/mailing_lists', array('mailingLists' => $student->getMailingLists())) ?>
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

    function fetchProgrammes(){
        $('#programmes_list').load("<?php echo url_for('student_programmes') ?>");
    }

    function fetchCourses(){
        $('#courses_list').load("<?php echo url_for('student_courses') ?>");
    }

    function fetchMailingLists(){
        $('#mailing_lists_list').load("<?php echo url_for('student_mailing_lists') ?>");
    }
</script>