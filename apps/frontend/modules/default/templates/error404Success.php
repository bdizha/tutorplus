<?php use_helper('I18N', 'Date') ?>
<?php //decorate_with(sfConfig::get("sf_app_dir").'/templates/public.php') ?>
<?php include_component('common', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('common', 'publicMenu', array("hideMenu" => true)) ?>
<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h3>Oops! Page Not Found</h3>
    </div>
    <div id="tp_admin_content">
        <div class="section-block">
            <div class="section-row">Did you type the URL?</div>
            <div class="section-row">You may have typed the address (URL) incorrectly. Check it to make sure you've got the exact right spelling, capitalization, etc.</div>
            <div class="section-row">What's next</div>
            <div class="section-row">
                <?php echo button_to("Dashboard", "@dashboard", array("class" => "button", "type" => "button")) ?>
                <?php echo button_to("Goto Previous Page", $sf_request->getReferer(), array("class" => "button", "type" => "button")) ?>
            </div>          
        </div>
    </div>
</div>