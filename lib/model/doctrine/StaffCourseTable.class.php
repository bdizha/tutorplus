<?php

/**
 * StaffCourseTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class StaffCourseTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object StaffCourseTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('StaffCourse');
    }

    public function deleteByCoursesIdsAndStaffId($courseIds, $staffId)
    {
        $query = $this->createQuery()
            ->delete()
            ->whereIn('course_id', $courseIds)
            ->andWhere("staff_id = ?", $staffId);

        return $query->execute();
    }
}