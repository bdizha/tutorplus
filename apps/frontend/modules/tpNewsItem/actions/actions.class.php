<?php

require_once dirname(__FILE__) . '/../lib/tpNewsItemGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpNewsItemGeneratorHelper.class.php';
/**
 * tpNewsItem actions.
 *
 * @package    tutorplus.org
 * @subpackage tpNewsItem
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpNewsItemActions extends autoTpNewsItemActions
{

    public function preExecute()
    {
        parent::preExecute();
        $this->announcements = AnnouncementTable::getInstance()->findAll();
        $this->newsItems = NewsItemTable::getInstance()->findAll();
    }

    public function executeIndex(sfWebRequest $request)
    {
        
    }

}