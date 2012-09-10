<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($course->getName(), 'course_show', $course) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_code">
  <?php echo $course->getCode() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_department">
  <?php echo $course->getDepartment() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_finalized">
  <?php echo get_partial('course/list_field_boolean', array('value' => $course->getIsFinalized())) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_academic_period">
  <?php echo $course->getAcademicPeriod() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_max_enrolled">
  <?php echo $course->getMaxEnrolled() ?>
</td>
