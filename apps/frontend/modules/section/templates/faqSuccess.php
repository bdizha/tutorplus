<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "faq")) ?>
<?php end_slot() ?>

<div id="sf_admin_container">
    <div class="sf_admin_heading">
        <h3>Frequently asked questions</h3>
    </div>
    <div id="sf_admin_content">
        <?php foreach ($faqs as $faq): ?>
            <div class="content-block">
                <h2><?php echo $faq->getQuestion() ?></h2>
                <div class="full-block">
                    <div class="even-row"><?php echo $faq->getAnswer() ?></div>
                </div>
            </div>        
        <?php endforeach; ?>
    </div>
</div>