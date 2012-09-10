<td class="sf_admin_text sf_admin_list_td_day">
  <?php echo get_partial('course_meeting_time/day', array('type' => 'list', 'course_meeting_time' => $course_meeting_time)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_time">
  <?php echo get_partial('course_meeting_time/time', array('type' => 'list', 'course_meeting_time' => $course_meeting_time)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_venue">
  <?php echo get_partial('course_meeting_time/venue', array('type' => 'list', 'course_meeting_time' => $course_meeting_time)) ?>
</td>
