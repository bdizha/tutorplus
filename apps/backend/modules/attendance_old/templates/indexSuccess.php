<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics2", "item_level_2" => "course_info", "current_route" => "attendance")) ?>
<?php end_slot() ?>

<div class="breadcrumb">
    <div id="current_path">
        <a id="first" href="/backend.php/course">Academics</a>
        <a href="/backend.php/course/<?php echo $course->getId() ?>"><?php echo __('%%code%% - %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?></a>
        <a href="/backend.php/attendance">Attendance</a>
    </div>
</div>

<div class="sf_admin_heading">
    <h3><?php echo __('Attendance', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <select id="academic_period_academic_info_id" name="academic_period[academic_info_id]">
        <option value="4">2008 - 2009 (Fall)</option>
        <option value="3">2008 - 2009 (Spring)</option>
        <option value="5">2007 - 2008 (Spring)</option>
    </select><br /><br />
    		
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bottom_unrecorded, .bottom_recorded').click(function(){
            location.href='/backend_dev.php/attendance_show';
        });
    }); 
</script>