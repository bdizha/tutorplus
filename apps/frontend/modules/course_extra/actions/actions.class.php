<?php

/**
 * course_extra actions.
 *
 * @package    tutorplus
 * @subpackage course_extra
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class course_extraActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {        
        $this->redirectUnless(!$course_id = $this->getUser()->getMyAttribute('course_show_id', null), "@course");        
        $this->forward404Unless($this->course = Doctrine_Core::getTable('Course')->find(array($course_id)), sprintf('Object Course does not exist (%s).', $course_id));
    }
}

