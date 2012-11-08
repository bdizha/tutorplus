<?php

/**
 * achievement actions.
 *
 * @package    tutorplus
 * @subpackage achievements
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class achievementActions extends sfActions
{

    public function preExecute()
    {
        $this->profile_type = "";
        if ($this->getUser()->getStudentId())
        {
            $this->profile = $this->getUser()->getStudent();
            $this->profile_type = "student";
        }
        else if ($this->getUser()->getInstructorId())
        {
            $this->profile = $this->getUser()->getInstructor();
            $this->profile_type = "instructor";
        }
        else if ($this->getUser()->getStaffId())
        {
            $this->profile = $this->getUser()->getStaff();
            $this->profile_type = "staff";

            echo "Oops, I'm a staff!, how could it possibly be possible?";
            die;
        }

        $this->forward404Unless($this->profile);
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        
    }

    public function executeAwards(sfWebRequest $request)
    {
    }

    public function executeQualifications(sfWebRequest $request)
    {
    }
}
