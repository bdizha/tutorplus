<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('tpCommon', 'publicMenu', array("currentParent" => "faqs")) ?>
<div id="tp_admin_container">
    <div id="tp_admin_content">
        <?php foreach ($faqs as $faq): ?>
            <div class="section-block">
                <h2><span class="q-and-a">Q:</span> <?php echo $faq->getQuestion() ?></h2>
                <span class="q-and-a">A:</span> <?php echo $faq->getAnswer() ?>
            </div>        
        <?php endforeach; ?>
    </div>
</div>