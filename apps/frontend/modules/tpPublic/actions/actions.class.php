<?php

/**
 * tpPublic actions.
 *
 * @package    tutorplus.org
 * @subpackage tpPublic
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpPublicActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executeIndex(sfWebRequest $request) {
        
    }

    /**
     * Executes faq action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executeFaq(sfWebRequest $request) {
        $this->faqs = FaqTable::getInstance()->findByIsPublishedAndSortedByPosition();
    }

    /**
     * Executes contact us action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executeContactUs(sfWebRequest $request) {
        
    }

    /**
     * Executes team action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executeLeadership(sfWebRequest $request) {
        
    }

    /**
     * Executes vision action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executeVision(sfWebRequest $request) {
        
    }

    /**
     * Executes institutions action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executeInstitutions(sfWebRequest $request) {
        $this->institutions = InstitutionTable::getInstance()->findAll();
    }

    /**
     * Executes courses action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executeCourses(sfWebRequest $request) {
        $this->courses = CourseTable::getInstance()->findByIsFinalized(true);
    }

    /**
     * Executes instructors action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executeInstructors(sfWebRequest $request) {
        $this->instructors = ProfileTable::getInstance()->findAll();
    }

    /**
     * Executes terms of service action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executeTos(sfWebRequest $request) {
        
    }

    /**
     * Executes privacy policy action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executePrivacyPolicy(sfWebRequest $request) {
        
    }

    /**
     * Executes pedagogy action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executePedagogy(sfWebRequest $request) {
        
    }

    /**
     * Executes lifelong learning action
     *
     * @param sfRequest $request A request object
     */
    tpPublic function executeLifelongLearning(sfWebRequest $request) {
        
    }

}
