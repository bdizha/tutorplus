<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'publicMenu', array("currentParent" => "institutions")) ?>
<?php end_slot() ?>

<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h1>Partnered Institutions</h1>
    </div>
    <div id="tp_admin_content">
            Below is a list of our partnered institutions which are offering online courses from around different regions of the world on this platform:
        <?php foreach ($institutions as $institution): ?>
            <div class="section-block">
<!--                <h2><?php echo $institution->getName() ?> (<?php echo $institution->getAbbreviation() ?>)</h2>-->
            </div>        
        <?php endforeach; ?>  
    </div>
</div>