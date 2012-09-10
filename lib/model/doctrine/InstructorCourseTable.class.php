<?php

/**
 * InstructorCourseTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class InstructorCourseTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object InstructorCourseTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('InstructorCourse');
    }

    public function deleteByCoursesIdsAndInstructorId($courseIds, $instructorId)
    {
        $query = $this->createQuery()
            ->delete()
            ->whereIn('course_id', $courseIds)
            ->andWhere("instructor_id = ?", $instructorId);

        return $query->execute();
    }

    public function deleteByCourseIdAndInstructorIds($courseId, $instructorIds = array())
    {
        $query = $this->createQuery()
            ->delete()
            ->whereIn('instructor_id', $instructorIds)
            ->andWhere("course_id = ?", $courseId);

        return $query->execute();
    }
}