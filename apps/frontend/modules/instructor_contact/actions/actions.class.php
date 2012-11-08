<?php

require_once dirname(__FILE__) . '/../lib/instructor_contactGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/instructor_contactGeneratorHelper.class.php';

/**
 * instructor_contact actions.
 *
 * @package    tutorplus
 * @subpackage instructor_contact
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class instructor_contactActions extends autoInstructor_contactActions {

    public function preExecute() {
        $instructorId = $this->getUser()->getMyAttribute('instructor_show_id', null);
        $this->instructor = instructorTable::getInstance()->find($instructorId);
        $this->redirectUnless($this->instructor, "@instructor");
        parent::preExecute();
    }

    public function executeNew(sfWebRequest $request) {
        $instructorContact = InstructorContactTable::getInstance()->findOneByInstructorId($this->instructor->getId());
        if ($instructorContact) {
            $this->redirect('@instructor_contact_edit?id=' . $instructorContact->getId());
        }

        parent::executeNew($request);
    }

}
