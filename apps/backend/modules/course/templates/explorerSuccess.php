<?php use_helper('I18N', 'Date') ?>
<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "courses", "current_child" => "courses", "current_link" => "course_explorer")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Courses Explorer" => "courses"))) ?>
<?php end_slot() ?>

<?php include_partial('common/assets') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <div class="course-description">
            <div class="image">
                <img src="/images/small-icon.hover.png">
            </div>
            <div class="info">
                <a class="internal" href="/course/healthpolicy">Business Information Systems</a>
                <span class="instructor">Prof Wallace Chigona</span>
                <span class="institution">University of Cape Town</span>
            </div>
            <div class="schedule">
                <span>Begins: Jun 25th 2012<br>8 weeks long</span>
            </div>
        </div>
        <div class="course-description">
            <div class="image">
                <img src="/images/small-icon.hover3.png">
            </div>
            <div class="info">
                <a class="internal" href="/course/healthpolicy">Human Computer Interaction</a>
                <span class="instructor">Prof Wallace Chigona</span>
                <span class="institution">University of Pretoria</span>
            </div>
            <div class="schedule">
                <span>Begins: Jun 25th 2012<br>8 weeks long</span>
            </div>
        </div>
        <div class="course-description">
            <div class="image">
                <img src="/images/small-icon.hover2.png">
            </div>
            <div class="info">
                <a class="internal" href="/course/healthpolicy">Introduction to Accounting</a>
                <span class="instructor">Prof Wallace Chigona</span>
                <span class="institution">University of South Africa</span>
            </div>
            <div class="schedule">
                <span>Begins: Jun 25th 2012<br>8 weeks long</span>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){        
        
    });
    //]]
</script>