<div class="content-row" id="profile-name">
    <h4><?php echo $profile->getFullName() ?></h4>&nbsp;-&nbsp;
    <span class="profile-value">Registered & active Student</span>
</div>
<div class="content-row" id="profile-attributes">
    <span class="profile-attribute">
        <span class="spotlight"></span>Faculty:
    </span>
    <span class="profile-value"><?php echo "Applied Science" ?></span>
    <span class="profile-attribute">
        <span class="spotlight"></span>Department:
    </span>
    <span class="profile-value"><?php echo "Computer Science" ?></span><br />
    <span class="profile-attribute">
        <span class="spotlight"></span>Current study:
    </span>
    <span class="profile-value"><?php echo $profile->getCurrentStudy() ?></span><br />
    <span class="profile-attribute">
        <span class="spotlight"></span>Enrollment year:
    </span>
    <span class="profile-value">2004</span>
    <span class="profile-attribute">
        <span class="spotlight"></span>Studied at:
    </span>
    <span class="profile-value"><?php echo $profile->getStudiedAt() ?></span><br />
    <span class="profile-attribute">
        <span class="spotlight"></span>High School:
    </span>
    <span class="profile-value"><?php echo $profile->getHighSchool() ?></span>
    <span class="profile-attribute">
        <span class="spotlight"></span>Lives in:
    </span>
    <span class="profile-value">
        <?php echo $profile->getStudentContact()->getCity() ?>,&nbsp;<?php echo $profile->getStudentContact()->getCountry() ?>
    </span>
</div>