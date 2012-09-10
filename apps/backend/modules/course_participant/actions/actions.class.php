<?php

/**
 * course_participant actions.
 *
 * @package    ecollegeplus
 * @subpackage course_participant
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_participantActions extends sfActions
{

    public function preExecute()
    {
        $this->redirectUnless($courseId = $this->getUser()->getMyAttribute('course_show_id', null), "@course");
        $this->forward404Unless($this->course = Doctrine_Core::getTable('Course')->find(array($courseId)), sprintf('Object Course does not exist (%s).', $courseId));
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        
    }

    /**
     * Executes choose students action
     *
     * @param sfRequest $request A request object
     */
    public function executeChooseStudents(sfWebRequest $request)
    {
        $this->currentStudentIds = array();
        
        // fetch all students for now
        $this->students = StudentTable::getInstance()->findAll();
        
        // look for the current course students
        $currentCourseStudents = StudentCourseTable::getInstance()->findByCourseId($this->course->getId());
        
        foreach ($currentCourseStudents as $currentCourseStudent)
        {
            $this->currentStudentIds[] = $currentCourseStudent->getStudentId();
        }

        $studentIds = $request->getParameter("student", array());
        if ($request->getMethod() == "POST")
        {
            $toDelete = array_diff($this->currentStudentIds, $studentIds);
            if (count($toDelete))
            {
                StudentCourseTable::getInstance()->deleteByCourseIdAndStudentIds($this->course->getId(), array_values($toDelete));
            }

            $toAdd = array_diff($studentIds, $this->currentStudentIds);
            if (count($toAdd))
            {
                foreach ($toAdd as $studentId)
                {
                    $studentCourse = new StudentCourse();
                    $studentCourse->setStudentId($studentId);
                    $studentCourse->setCourseId($this->course->getId());
                    $studentCourse->save();
                }
            }

            $this->currentStudentIds = $studentIds;
        }
    }

    /**
     * Executes choose instructors action
     *
     * @param sfRequest $request A request object
     */
    public function executeChooseInstructors(sfWebRequest $request)
    {        
        $this->currentInstructorIds = array();        
        
        // fetch all instructors for now
        $this->instructors = InstructorTable::getInstance()->findAll();
        
        // look for the current course students
        $currentCourseInstructors = InstructorCourseTable::getInstance()->findByCourseId($this->course->getId());
        
        foreach ($currentCourseInstructors as $currentCourseInstructor)
        {
            $this->currentInstructorIds[] = $currentCourseInstructor->getInstructorId();
        }

        $instructorIds = $request->getParameter("instructor", array());
        if ($request->getMethod() == "POST")
        {
            $toDelete = array_diff($this->currentInstructorIds, $instructorIds);
            if (count($toDelete))
            {
                InstructorCourseTable::getInstance()->deleteByCourseIdAndInstructorIds($this->course->getId(), array_values($toDelete));
            }

            $toAdd = array_diff($instructorIds, $this->currentInstructorIds);
            if (count($toAdd))
            {
                foreach ($toAdd as $instructorId)
                {
                    $instructorCourse = new InstructorCourse();
                    $instructorCourse->setInstructorId($instructorId);
                    $instructorCourse->setCourseId($this->course->getId());
                    $instructorCourse->save();
                }
            }

            $this->currentInstructorIds = $instructorIds;
        }
    }

    /**
     * Executes students action
     *
     * @param sfRequest $request A request object
     */
    public function executeStudents(sfWebRequest $request)
    {
        
    }

    /**
     * Executes instructors action
     *
     * @param sfRequest $request A request object
     */
    public function executeInstructors(sfWebRequest $request)
    {
        
    }

}
