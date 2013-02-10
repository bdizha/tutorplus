<?php

require_once dirname(__FILE__).'/../lib/news_itemGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/news_itemGeneratorHelper.class.php';

/**
 * news_item actions.
 *
 * @package    tutorplus.org
 * @subpackage news_item
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class news_itemActions extends autoNews_itemActions
{
    public function preExecute() {
        parent::preExecute();
    	$this->announcements = AnnouncementTable::getInstance()->findAll();
    	$this->newsItems = NewsItemTable::getInstance()->findAll();
    }

	public function executeIndex(sfWebRequest $request){
	}
}
