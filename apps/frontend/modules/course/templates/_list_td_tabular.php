<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($course->getName() . " (" . $course->getCode() . ")", 'course_show', $course) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_department">
  <?php echo $course->getDepartment() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_academic_period">
  <?php echo $course->getAcademicPeriod() ?>
</td>