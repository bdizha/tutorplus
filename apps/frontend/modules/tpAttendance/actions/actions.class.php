<?php

require_once dirname(__FILE__) . '/../lib/tpAttendanceGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpAttendanceGeneratorHelper.class.php';

/**
 * tpAttendance actions.
 *
 * @package    tutorplus
 * @subpackage tpAttendance
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpAttendanceActions extends autoTpAttendanceActions
{

    public function executeIndex(sfWebRequest $request)
    {
        $course_id = $this->getUser()->getMyAttribute('course_show_id', null);
        if ($course_id)
        {
            $this->forward404Unless($this->course = Doctrine_Core::getTable('Course')->find($course_id));

            AttendanceTable::getInstance()->createAttendanceDatesByCourse($this->course);

            $this->attendances = AttendanceTable::getInstance()->findByCourse($this->course);
        }
        else
        {
            $this->forward("course", "index");
        }
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->attendance = $this->getRoute()->getObject();
        if ($this->attendance)
        {
            StudentAttendanceTable::getInstance()->createDefaultStudentAttendances($this->attendance->getCourse());

            $this->form = new AttendanceForm($this->attendance);
        }
        else
        {
            $this->forward("course", "index");
        }
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->attendance = $this->getRoute()->getObject();
        $this->form = new AttendanceForm($this->attendance);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The student attendance has been created successfully.' : 'The student attendance has been updated successfully.';

            try
            {
                $attendance = $form->save();
            }
            catch (Doctrine_Validator_Exception $e)
            {

                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors)
                {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $attendance)));

            $this->getUser()->setFlash('notice', $notice);
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
