<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "offered_courses")) ?>
<?php end_slot() ?>

<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h3>Offered Unisa Courses</h3>
    </div>
    <div id="tp_admin_content">
        <?php foreach ($departments as $department): ?>
            <div class="section-block">
                <h2><?php echo $department->getName() ?> (<?php echo $department->getAbbreviation() ?>)</h2>
                <ul class="department-course">
                    <?php foreach ($department->getCourses() as $course): ?>
                        <li><?php echo $course->getName() ?> (<?php echo $course->getCode() ?>)</li>
                    <?php endforeach; ?>
                </ul>        
            </div>        
        <?php endforeach; ?>  
    </div>
</div>