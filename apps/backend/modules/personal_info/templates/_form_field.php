<div class="<?php echo $class ?>">    
    <?php echo $form[$name]->renderLabel() ?>
    <div class="content <?php $form[$name]->hasError() and print ' errors' ?>">      
        <?php echo $form[$name]->render() ?>
    </div>
</div>