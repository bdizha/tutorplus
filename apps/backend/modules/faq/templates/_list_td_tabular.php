<td class="sf_admin_text sf_admin_list_td_question">
  <?php echo $faq->getQuestion() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_answer">
  <?php echo myToolkit::shortenString($faq->getAnswer(), 130) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_published">
  <?php echo get_partial('faq/list_field_boolean', array('value' => $faq->getIsPublished())) ?>
</td>
