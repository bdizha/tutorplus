<div class="course_info">
    <div class="even-row">
        <div class="row-column">
            <span class="label">Current study:</span> <?php echo $user->getProfile()->getCurrentStudy() ?>
        </div>
        <div class="row-column">
            <span class="label">Department:</span> Education
        </div>
    </div>
    <div class="even-row">
        <div class="row-column">
            <span class="label">Institution:</span> University of Cape Town (UCT)
        </div>
        <div class="row-column">
            <span class="label">Studied at:</span> <?php echo $user->getProfile()->getStudiedAt() ?>
        </div>
    </div>
    <?php if ($user->getType() == sfGuardUserTable::TYPE_STUDENT): ?>
        <div class="even-row">
            <div class="row-column">
                <span class="label">High School:</span> <?php echo $user->getProfile()->getHighSchool() ?>
            </div>
            <div class="row-column"></div>
        </div>
    <?php endif; ?>
</div>