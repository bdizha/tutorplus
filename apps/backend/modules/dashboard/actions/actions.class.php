<?php

/**
 * dashboard actions.
 *
 * @package    ecollegeplus
 * @subpackage dashboard
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        // set the discussion module i.e for the menu to know what links to show
        $this->getUser()->setMyAttribute('discussion_module_id', DiscussionTable::MODULE_DISCUSSION);
    }

    public function executeDetails(sfWebRequest $request)
    {
        $this->announcements = AnnouncementTable::getInstance()->retrieveAnnouncements(null, 100);
        $this->news = NewsTable::getInstance()->retrieveNews(null, 100);
        $this->events = CalendarEventTable::getInstance()->retrieveByVisibility(true);
    }

    public function executeAnnouncements(sfWebRequest $request)
    {
        $this->announcements = AnnouncementTable::getInstance()->retrieveAnnouncements(null, 100);
    }

    public function executeNews(sfWebRequest $request)
    {
        $this->news = NewsTable::getInstance()->retrieveNews(null, 100);
    }
}
