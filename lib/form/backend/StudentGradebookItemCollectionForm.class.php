<?php

class StudentGradebookItemCollectionForm extends sfForm
{

    public function configure()
    {
        if (!$gradebook = $this->getOption('gradebook'))
        {
            throw new InvalidArgumentException('You must provide a gradebook object.');
        }

        $i = 0;
        foreach ($gradebook->getCourse()->getCourseStudents() as $courseStudent)
        {
            foreach ($gradebook->getGradebookItems() as $gradebookItem)
            {
                $form = new StudentGradebookItemForm($courseStudent->getStudent()->getStudentGradebookItem($gradebookItem->getId()));
                $this->embedForm($i, $form);
                $i = $i + 1;
            }
        }
    }

}