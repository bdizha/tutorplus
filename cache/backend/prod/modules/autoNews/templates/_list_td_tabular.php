<td class="sf_admin_text sf_admin_list_td_heading">
  <?php echo $news->getHeading() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_blurb">
  <?php echo $news->getBlurb() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_published">
  <?php echo get_partial('news/list_field_boolean', array('value' => $news->getIsPublished())) ?>
</td>
