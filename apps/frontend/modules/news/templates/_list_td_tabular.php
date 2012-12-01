<td class="sf_admin_text sf_admin_list_td_heading">
    <?php echo link_to($news->getHeading(), 'news_show', $news) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_blurb">
    <?php echo myToolkit::shortenString($news->getBlurb(), 100) ?>
</td>