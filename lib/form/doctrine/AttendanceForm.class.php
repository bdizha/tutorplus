<?php

/**
 * Attendance form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AttendanceForm extends BaseAttendanceForm
{
  public function configure()
  {
        unset(
            $this['created_at'], $this['updated_at']
        );
        
        $this->widgetSchema['date'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['course_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['course_meeting_time_id'] = new sfWidgetFormInputHidden();

        $student_attendance_collection_form = new StudentGradebookCollectionForm(null, array(
                'attendance' => $this->getObject(),
            ));

        $this->embedForm('attendances', $student_attendance_collection_form);
  }
}
