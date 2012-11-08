<?php

require_once dirname(__FILE__) . '/../lib/announcementGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/announcementGeneratorHelper.class.php';

/**
 * announcement actions.
 *
 * @package    tutorplus
 * @subpackage announcement
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class announcementActions extends autoAnnouncementActions
{

    public function executeDisplay(sfWebRequest $request)
    {
        $this->announcements = AnnouncementTable::getInstance()->retrieveOrdered();
    }

    public function executeRecent(sfWebRequest $request)
    {
        $this->announcements = AnnouncementTable::getInstance()->retrieveLatest(null, 3);
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->forward404Unless($this->announcement = $this->getRoute()->getObject());
    }

}
