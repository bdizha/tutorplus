<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "faq")) ?>
<?php end_slot() ?>

<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h3>Frequently asked questions</h3>
    </div>
    <div id="tp_admin_content">
        <?php foreach ($faqs as $faq): ?>
            <div class="section-block">
                <h2><?php echo $faq->getQuestion() ?></h2>
                <?php echo $faq->getAnswer() ?>
            </div>        
        <?php endforeach; ?>
    </div>
</div>