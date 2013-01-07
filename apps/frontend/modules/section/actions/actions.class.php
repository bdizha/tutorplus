<?php

/**
 * section actions.
 *
 * @package    tutorplus.org
 * @subpackage section
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sectionActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
    }

    /**
     * Executes faq action
     *
     * @param sfRequest $request A request object
     */
    public function executeFaq(sfWebRequest $request) {
        $this->faqs = FaqTable::getInstance()->findAll();
    }

    /**
     * Executes contact us action
     *
     * @param sfRequest $request A request object
     */
    public function executeContactUs(sfWebRequest $request) {
    }

    /**
     * Executes team action
     *
     * @param sfRequest $request A request object
     */
    public function executeTeam(sfWebRequest $request) {
    }

    /**
     * Executes mission action
     *
     * @param sfRequest $request A request object
     */
    public function executeMission(sfWebRequest $request) {
    }

    /**
     * Executes affilited institutions action
     *
     * @param sfRequest $request A request object
     */
    public function executeInstitutions(sfWebRequest $request) {
        $this->institutions = InstitutionTable::getInstance()->findAll();
    }

    /**
     * Executes philosophy action
     *
     * @param sfRequest $request A request object
     */
    public function executePhilosophy(sfWebRequest $request) {
    }

    /**
     * Executes work action
     *
     * @param sfRequest $request A request object
     */
    public function executeWork(sfWebRequest $request) {
    }

    /**
     * Executes students action
     *
     * @param sfRequest $request A request object
     */
    public function executeStudents(sfWebRequest $request) {
    }

    /**
     * Executes instructors action
     *
     * @param sfRequest $request A request object
     */
    public function executeInstructors(sfWebRequest $request) {
    }

    /**
     * Executes terms of service action
     *
     * @param sfRequest $request A request object
     */
    public function executeTos(sfWebRequest $request) {
    }

    /**
     * Executes privacy policy action
     *
     * @param sfRequest $request A request object
     */
    public function executePrivacyPolicy(sfWebRequest $request) {
    }

}
