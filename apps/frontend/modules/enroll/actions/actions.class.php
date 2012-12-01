<?php

/**
 * enroll actions.
 *
 * @package    tutorplus.org
 * @subpackage enroll
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class enrollActions extends sfActions {

    /**
     * Executes studentRegister action
     *
     * @param sfRequest $request A request object
     */
    public function executeStudentRegister(sfWebRequest $request) {
        $this->form = new StudentForm();
    }

    /**
     * Executes stduentCreate action
     *
     * @param sfRequest $request A request object
     */
    public function executeStudentCreate(sfWebRequest $request) {
        $this->student = $this->getRoute()->getObject();
        $this->form = new StudentForm($this->student);
        //$this->processStudentForm($request, $this->form, "@student_inline_edit?id=" . $this->student->getId());
    }

    /**
     * Executes instructorRegister action
     *
     * @param sfRequest $request A request object
     */
    public function executeInstructorRegister(sfWebRequest $request) {
        $this->form = new InstructorForm();
    }

    /**
     * Executes instructorCreate action
     *
     * @param sfRequest $request A request object
     */
    public function executeInstructorCreate(sfWebRequest $request) {
    }

}
