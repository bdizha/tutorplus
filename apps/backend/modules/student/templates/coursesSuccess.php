<ul>
    <?php foreach ($courses_list as $course): ?>
        <li>
            <div class="course-image">
                <img src="/images/icons/14x14/my_courses.png" alt="<?php echo $course["name"] ?>">
            </div>
            <div class="course-name">
                <?php echo $course["name"] ?>
            </div>
        </li> 
    <?php endforeach; ?>      
</ul>
<div class="clear"></div>