<?php

/**
 * AssignmentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AssignmentTable extends Doctrine_Table
{
    static public $types = array(
        1 => 'Assignment',
        2 => 'Discussion',
        3 => 'Quiz',
        4 => 'Not Graded'
    );
    static public $submissionTypes = array(
        1 => 'No Submission',
        2 => 'Online Submission',
        3 => 'On Paper'
    );
    static public $gradingTypes = array(
        1 => 'Points',
        2 => 'Percentage',
        3 => 'Complete/Incomplete',
        4 => 'Letter Grade'
    );

    /**
     * Returns an instance of this class.
     *
     * @return object AssignmentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Assignment');
    }

    public function getTypes()
    {
        return self::$types;
    }

    public function getSubmissionTypes()
    {
        return self::$submissionTypes;
    }

    public function getGradingTypes()
    {
        return self::$gradingTypes;
    }

    public function retrieveUpcomingAssignments(Doctrine_Query $q = null)
    {
        if (is_null($q))
        {
            $q = Doctrine_Query::create()
                ->from('Assignment a')
                ->limit($limit);
        }
        $q->addOrderBy('a.created_at DESC');

        return $q->execute();
    }

}