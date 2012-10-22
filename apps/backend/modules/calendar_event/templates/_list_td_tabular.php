<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($calendar_event->getName(), 'calendar_event_show', $calendar_event) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_user">
  <?php echo $calendar_event->getUser() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_when">
  <?php echo $calendar_event->getWhen() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_location">
  <?php echo $calendar_event->getLocation() ?>
</td>
