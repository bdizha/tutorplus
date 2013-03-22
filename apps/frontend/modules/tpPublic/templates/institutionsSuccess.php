<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('tpCommon', 'publicMenu', array("currentParent" => "institutions")) ?>
<div id="tp_admin_container">
    <div id="tp_admin_content">
            Below is a list of our partnered institutions which are offering online courses from around different regions of the world on this platform:
        <?php foreach ($institutions as $institution): ?>
            <div class="section-block">
<!--                <h2><?php echo $institution->getName() ?> (<?php echo $institution->getAbbreviation() ?>)</h2>-->
            </div>        
        <?php endforeach; ?>  
    </div>
</div>