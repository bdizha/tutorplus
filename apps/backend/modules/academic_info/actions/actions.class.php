<?php

/**
 * academic_info actions.
 *
 * @package    ecollegeplus
 * @subpackage academic_info
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class academic_infoActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->form = new AcademicPeriodDropdownForm();
    }

    public function executeShow(sfWebRequest $request) {
        $this->academic_period = $this->getRoute()->getObject();
        $this->forward404Unless($this->academic_period);

        $this->course_meeting_times = CourseMeetingTimeTable::getInstance()->findByCourse(4);
        $this->course_links = CourseLinkTable::getInstance()->findByCourse(4);
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new AcademicPeriodForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new AcademicPeriodForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($academic_period = Doctrine_Core::getTable('AcademicPeriod')->find(array($request->getParameter('id'))), sprintf('Object academic_period does not exist (%s).', $request->getParameter('id')));
        $this->form = new AcademicPeriodForm($academic_period);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($academic_period = Doctrine_Core::getTable('AcademicPeriod')->find(array($request->getParameter('id'))), sprintf('Object academic_period does not exist (%s).', $request->getParameter('id')));
        $this->form = new AcademicPeriodForm($academic_period);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($academic_period = Doctrine_Core::getTable('AcademicPeriod')->find(array($request->getParameter('id'))), sprintf('Object academic_period does not exist (%s).', $request->getParameter('id')));
        $academic_period->delete();

        $this->redirect('academic_info/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $academic_period = $form->save();

            $this->redirect('academic_info/edit?id=' . $academic_period->getId());
        }
    }

}
