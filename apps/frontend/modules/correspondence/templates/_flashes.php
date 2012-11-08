<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="notice"><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></div>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
    <div class="error">
        <div class="title">Oops! Please correct the following encountered errors.</div>
        <ol>
            <?php if (isset($form)): ?>
                <?php foreach ($form as $name => $field): ?>
                    <?php if ($field->hasError()): ?>
                        <?php echo '<li>' . $field->getError() . '</li>' ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($form->hasGlobalErrors()): ?>
                    <?php foreach ($form->getGlobalErrors() as $error): ?>
                        <?php echo '<li>' . $error . '</li>' ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php echo '<li>' . __($sf_user->getFlash('error'), array(), 'sf_admin') . '</li>' ?>
            <?php endif; ?>
        </ol>
    </div>
<?php endif; ?>