<?php

/**
 * StudentAttendance form.
 *
 * @package    ecollegeplus
 * @subpackage form
 * @author     Batanayi Matuku
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StudentAttendanceForm extends BaseStudentAttendanceForm
{

    public function configure()
    {
        unset(
            $this['created_at'], $this['updated_at']
        );

        $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
                'choices' => StudentAttendanceTable::getInstance()->getStatuses()
            ));

        $this->validatorSchema['status'] = new sfValidatorChoice(array(
                'choices' => array_keys(StudentAttendanceTable::getInstance()->getStatuses()),
            ));

        $this->widgetSchema['attendance_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['student_id'] = new sfWidgetFormInputHidden();
    }

}
