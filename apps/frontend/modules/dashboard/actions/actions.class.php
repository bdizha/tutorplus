<?php

/**
 * dashboard actions.
 *
 * @package    tutorplus
 * @subpackage dashboard
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions {

    public function preExecute() {
        // redirect to the home page
        $this->redirectUnless($this->getUser()->getId(), "/");

        $this->helper = new dashboardGeneratorHelper();
        parent::preExecute();
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        // set the discussion module i.e for the menu to know what links to show
        $this->getUser()->setMyAttribute('discussion_module_id', DiscussionTable::MODULE_DISCUSSION);

        $this->courses = $this->getUser()->getProfile()->getCourses();

        $this->announcements = AnnouncementTable::getInstance()->retrieveLatest();
        $this->newsItems = NewsItemTable::getInstance()->findLatest(100);
        //$this->events = CalendarEventTable::getInstance()->retrieveByVisibility(true);
        $this->notifications = ActivityFeedTable::getInstance()->findByProfileId($this->getUser()->getId(), 3);
        $this->discussions = DiscussionTable::getInstance()->findPopularDiscussionsByProfileId($this->getUser()->getId());
        $this->peers = PeerTable::getInstance()->findByProfileId($this->getUser()->getId());
    }

    public function preError404() {
        
    }

}
