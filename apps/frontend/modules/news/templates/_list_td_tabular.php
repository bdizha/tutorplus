<td class="sf_admin_text sf_admin_list_td_heading">
    <?php echo link_to($news->getHeading(), 'news_show', $news) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_blurb">
    <?php echo myToolkit::shortenString($news->getBlurb(), 100) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_published">
    <?php echo get_partial('news/list_field_boolean', array('value' => $news->getIsPublished())) ?>
</td>
