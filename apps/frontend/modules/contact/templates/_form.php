<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('contact/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('contact/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'contact/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['first_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['first_name']->renderError() ?>
          <?php echo $form['first_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['last_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['last_name']->renderError() ?>
          <?php echo $form['last_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nick_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['nick_name']->renderError() ?>
          <?php echo $form['nick_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email_address']->renderLabel() ?></th>
        <td>
          <?php echo $form['email_address']->renderError() ?>
          <?php echo $form['email_address'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['phone_work']->renderLabel() ?></th>
        <td>
          <?php echo $form['phone_work']->renderError() ?>
          <?php echo $form['phone_work'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['phone_home']->renderLabel() ?></th>
        <td>
          <?php echo $form['phone_home']->renderError() ?>
          <?php echo $form['phone_home'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['phone_mobile']->renderLabel() ?></th>
        <td>
          <?php echo $form['phone_mobile']->renderError() ?>
          <?php echo $form['phone_mobile'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['postcode']->renderLabel() ?></th>
        <td>
          <?php echo $form['postcode']->renderError() ?>
          <?php echo $form['postcode'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['address_line_one']->renderLabel() ?></th>
        <td>
          <?php echo $form['address_line_one']->renderError() ?>
          <?php echo $form['address_line_one'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['address_line_two']->renderLabel() ?></th>
        <td>
          <?php echo $form['address_line_two']->renderError() ?>
          <?php echo $form['address_line_two'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['city']->renderLabel() ?></th>
        <td>
          <?php echo $form['city']->renderError() ?>
          <?php echo $form['city'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['state_province_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['state_province_id']->renderError() ?>
          <?php echo $form['state_province_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['country_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['country_id']->renderError() ?>
          <?php echo $form['country_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
