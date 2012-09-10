<?php use_helper('gfMisc') ?>
<ul>
    <?php foreach ($student_correspondences as $correspondence): ?>
        <li id="found_correspondent_<?php echo $correspondence->getId() ?>">
            <div class="correspondent-image">
                <img src="/uploads/users/6/avatar_48.png" alt="<?php echo $correspondence->getRelevantName($sf_user->getId()) ?>"></img>
            </div>
            <div class="correspondent-show">
                <div class="correspondent-name"><?php echo $correspondence->getRelevantName($sf_user->getId()) ?></div>
                <span class="<?php echo strtolower(getCorrespondenceStatus($correspondence->getStatus())) ?>"><?php echo getCorrespondenceStatus($correspondence->getStatus()) ?></span>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<div class="clear"></div>