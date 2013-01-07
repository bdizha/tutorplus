<?php

/**
 * ProfileGradebookItemTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProfileGradebookItemTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProfileGradebookItemTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ProfileGradebookItem');
    }

    public function createDefaultStudentGradebookItems($gradebook = null)
    {
        foreach ($gradebook->getCourse()->getCourseStudents() as $courseStudent)
        {
            foreach ($gradebook->getGradebookItems() as $gradebookItem)
            {
                if (!is_object($this->retrieveByStudentAndGradebookItem($courseStudent->getStudentId(), $gradebookItem->getId())))
                {
                    $studentGradebookItem = new StudentGradebookItem();
                    $studentGradebookItem->setStudent($courseStudent->getStudent());
                    $studentGradebookItem->setGradebookItem($gradebookItem);
                    $studentGradebookItem->setPoints(0);
                    $studentGradebookItem->save();
                }
            }
        }
    }

    public function retrieveByStudentAndGradebookItem($student_id = null, $gradebookItemId = null)
    {
        $query = $this->createQuery('sgi')
            ->where('sgi.student_id = ? AND sgi.gradebook_item_id = ?', array($student_id, $gradebookItemId));

        return $query->fetchOne();
    }

    public function retrieveByStudentAndGradebook($student_id = null, $gradebook_id = null)
    {
        $query = $this->createQuery('sgi')
            ->innerJoin('sgi.GradebookItem gi')
            ->where('sgi.student_id = ?', $student_id)
            ->addWhere('gi.gradebook_id = ?', $gradebook_id);

        return $query->execute();
    }

    public function retrieveByGradebook($gradebook_id = null)
    {
        $query = $this->createQuery('sgi')
            ->innerJoin('sgi.GradebookItem gi')
            ->where('gi.gradebook_id = ?', $gradebook_id);

        return $query->fetchArray();
    }
}