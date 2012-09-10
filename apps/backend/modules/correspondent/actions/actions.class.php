<?php

/**
 * correspondent actions.
 *
 * @package    ecollegeplus
 * @subpackage correspondents
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class correspondentActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {        
    }
    
    public function executeProfile(sfWebRequest $request)
    {        
        $this->profile = $this->getUser()->getCorrespondent($request->getParameter("id", null));
        
        //myToolkit::debug($this->profile->toArray());
    }

    public function executeStudies(sfWebRequest $request)
    {
        
    }

    public function executeStudents(sfWebRequest $request)
    {
        $this->student_correspondences = CorrespondenceTable::getInstance()->retrieveStudentCorrespondencesByUserId($this->getUser()->getId());
    }

    public function executeInstructors(sfWebRequest $request)
    {
        $this->instructor_correspondences = CorrespondenceTable::getInstance()->retrieveInstructorCorrespondencesByUserId($this->getUser()->getId());
    }

    public function executeCorrespond(sfWebRequest $request)
    {
        $this->correspondents = array();
        $this->find_correspondents = "";
        $this->students = array();
        $correspondents = array();
        $students = array();

        $current_correspondences = CorrespondenceTable::getInstance()->retrieveCorrespondencesByUserId($this->getUser()->getId());

        $this->find_students = "";
        if ($request->getMethod() == "POST")
        {
            $find = $request->getParameter("find");
            if (!empty($find["correspondents"]))
            {
                $this->find_correspondents = $find["correspondents"];
                $correspondents = sfGuardUserTable::getInstance()->findByFields($this->find_correspondents, array($this->getUser()->getId()), 100)->toKeyValueArray('id', 'name');
            }
            else
            {
                $correspondents = sfGuardUserTable::getInstance()->findByFields("%", array($this->getUser()->getId()), 100)->toKeyValueArray('id', 'name');
            }
        }
        else
        {
            $correspondents = sfGuardUserTable::getInstance()->findByFields("%", array($this->getUser()->getId()), 100)->toKeyValueArray('id', 'name');
        }

        //make duplicate
        $this->correspondents = $correspondents;
        foreach ($current_correspondences as $correspondence)
        {
            if (in_array($correspondence->getInnitiatorId(), array_keys($correspondents)))
            {
                $this->correspondents[$correspondence->getInnitiatorId()] = array(
                    "id" => $correspondence->getInnitiatorId(),
                    "name" => $correspondents[$correspondence->getInnitiatorId()],
                    "status" => $correspondence->getStatus(),
                    "name" => $correspondents[$correspondence->getInnitiatorId()],
                    "status" => $correspondence->getStatus(),
                    "is_request" => ($correspondence->getStatus() == 0) ? true : false,
                );
            }
            else if (in_array($correspondence->getCorrespondentId(), array_keys($correspondents)))
            {
                $this->correspondents[$correspondence->getCorrespondentId()] = array(
                    "id" => $correspondence->getCorrespondentId(),
                    "name" => $correspondents[$correspondence->getCorrespondentId()],
                    "status" => $correspondence->getStatus(),
                    "is_request" => false
                );
            }
        }
    }

    public function executeInstructorCorrespond(sfWebRequest $request)
    {
        $this->form = new ProfilePhotoForm(null, array('user' => $this->getUser()));
    }

}
