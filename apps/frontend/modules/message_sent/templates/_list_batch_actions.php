<li class="sf_admin_batch_actions_choice">
  <select name="batch_select" class="batch_selects">
    <option value=""><?php echo __('Choose an action', array(), 'sf_admin') ?></option>
    <option value="batchTrash"><?php echo __('Trash', array(), 'sf_admin') ?></option>
  </select>
  <?php $form = new BaseForm(); if ($form->isCSRFProtected()): ?>
    <input type="hidden" name="<?php echo $form->getCSRFFieldName() ?>" value="<?php echo $form->getCSRFToken() ?>" />
  <?php endif; ?>
  <input type="button" id="batch_go" class="save" value="<?php echo __('Go', array(), 'sf_admin') ?>" />
</li>