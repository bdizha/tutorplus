<td colspan="3">
  <?php echo __('%%heading%% - %%blurb%% - %%is_published%%', array('%%heading%%' => $news->getHeading(), '%%blurb%%' => $news->getBlurb(), '%%is_published%%' => get_partial('news/list_field_boolean', array('value' => $news->getIsPublished()))), 'messages') ?>
</td>
