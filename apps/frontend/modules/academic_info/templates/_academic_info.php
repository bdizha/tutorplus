<div class="academic-info-row">
    <div class="row-column">
        <span class="label">Current study:</span>
        <span class="value"><?php echo $user->getProfile()->getCurrentStudy() ?></span>
    </div>
    <div class="row-column">
        <span class="label">Department:</span>
        <span class="value">Education</span>
    </div>
</div>
<div class="academic-info-row">
    <div class="row-column">
        <span class="label">Institution:</span>
        <span class="value">University of Cape Town (UCT)</span>
    </div>
    <div class="row-column">
        <span class="label">Studied at:</span>
        <span class="value"><?php echo $user->getProfile()->getStudiedAt() ?></span>
    </div>
</div>
<?php if ($user->getType() == sfGuardUserTable::TYPE_STUDENT): ?>
    <div class="academic-info-row">
        <div class="row-column">
            <span class="label">High School:</span>
            <span class="value"><?php echo $user->getProfile()->getHighSchool() ?></span>
        </div>
    </div>
<?php endif; ?>