<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'publicMenu', array("currentParent" => "faqs")) ?>
<?php end_slot() ?>

<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h1>Frequently asked questions</h1>
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