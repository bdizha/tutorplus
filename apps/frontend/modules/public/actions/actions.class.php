<?php

/**
 * public actions.
 *
 * @package    tutorplus.org
 * @subpackage public
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicActions extends sfActions {

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
    public function executeLeadership(sfWebRequest $request) {
    }

    /**
     * Executes mission action
     *
     * @param sfRequest $request A request object
     */
    public function executeStory(sfWebRequest $request) {
    }

    /**
     * Executes institutions action
     *
     * @param sfRequest $request A request object
     */
    public function executeInstitutions(sfWebRequest $request) {
        $this->institutions = InstitutionTable::getInstance()->findAll();
    }

    /**
     * Executes courses action
     *
     * @param sfRequest $request A request object
     */
    public function executeCourses(sfWebRequest $request) {
        $this->courses = CourseTable::getInstance()->findAll();
    }

    /**
     * Executes instructors action
     *
     * @param sfRequest $request A request object
     */
    public function executeInstructors(sfWebRequest $request) {
        $this->instructors = ProfileTable::getInstance()->findAll();
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
