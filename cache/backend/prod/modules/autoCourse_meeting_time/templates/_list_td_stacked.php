<td colspan="3">
  <?php echo __('%%day%% - %%time%% - %%venue%%', array('%%day%%' => get_partial('course_meeting_time/day', array('type' => 'list', 'course_meeting_time' => $course_meeting_time)), '%%time%%' => get_partial('course_meeting_time/time', array('type' => 'list', 'course_meeting_time' => $course_meeting_time)), '%%venue%%' => get_partial('course_meeting_time/venue', array('type' => 'list', 'course_meeting_time' => $course_meeting_time))), 'messages') ?>
</td>
