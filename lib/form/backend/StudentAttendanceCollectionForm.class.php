<?php

class StudentGradebookCollectionForm extends sfForm
{

    public function configure()
    {
        if (!$attendance = $this->getOption('attendance'))
        {
            throw new InvalidArgumentException('You must provide an attendance object.');
        }

        $i = 0;
        foreach ($attendance->getCourse()->getStudents() as $studentAttendance)
        {
            $form = new StudentAttendanceForm($studentAttendance->getStudentAttendance($attendance->getId()));
            $this->embedForm($i, $form);
            $i = $i + 1;
        }
    }

}