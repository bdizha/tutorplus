<?php

/**
 * dashboard actions.
 *
 * @package    ecollegeplus
 * @subpackage dashboard
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions {

    public function preExecute() {
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
        
        //$this->announcements = AnnouncementTable::getInstance()->findLatestByUserId($this->getUser()->getId(), 100);
        $this->newsItems = NewsTable::getInstance()->findLatest(100);
        //$this->events = CalendarEventTable::getInstance()->retrieveByVisibility(true);
        $this->notifications = ActivityFeedTable::getInstance()->findByUserId($this->getUser()->getId(), 3);
        $this->discussions = DiscussionTable::getInstance()->findPopularDiscussionsByUserId($this->getUser()->getId());
        $this->peers = PeerTable::getInstance()->findByUserId($this->getUser()->getId());
        
        //myToolkit::debug($this->myPeers->toArray());
    }
}
