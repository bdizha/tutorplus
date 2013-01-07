<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "institutions")) ?>
<?php end_slot() ?>

<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h3>Affiliated Institutions</h3>
    </div>
    <div id="tp_admin_content">
        <?php foreach ($institutions as $institution): ?>
            <div class="section-block">
                <h2><?php echo $institution->getName() ?> (<?php echo $institution->getAbbreviation() ?>)</h2>
            </div>        
        <?php endforeach; ?>  
    </div>
</div>