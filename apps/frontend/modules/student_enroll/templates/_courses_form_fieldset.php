<?php foreach (DepartmentTable::getInstance()->findAll() as $department): ?>
    <?php if ($department->getCourses()->count() > 0): ?>
        <fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($department->getName())) ?>">
            <h2><?php echo $department->getName() ?> (<?php echo $department->getAbbreviation() ?>)</h2>
            <?php foreach ($department->getCourses() as $course): ?>
                <?php $name = preg_replace('/[^a-z0-9_]/', '_', strtolower($course->getCode())) ?>
                <?php $label = $course->getName() ?> (<?php $label = $course->getCode() ?>)
                <div class="department-course sf_admin_form_field_<?php echo $name ?>"> 
                    <div class="checkbox">
                        <?php echo $form[$name]->render() ?>
                    </div>   
                    <?php echo $form[$name]->renderLabel($label) ?>
                </div>
            <?php endforeach; ?>
        </fieldset>
    <?php endif; ?>
<?php endforeach; ?>