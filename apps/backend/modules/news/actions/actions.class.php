<?php

require_once dirname(__FILE__) . '/../lib/newsGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/newsGeneratorHelper.class.php';

/**
 * news actions.
 *
 * @package    tutorplus
 * @subpackage news
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends autoNewsActions
{

    public function executeDisplay(sfWebRequest $request)
    {
        $this->newsItems = NewsTable::getInstance()->retrieveOrdered();
    }

    public function executeRecent(sfWebRequest $request)
    {
        $this->newsItems = NewsTable::getInstance()->retrieveLatest(null, 3);
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->forward404Unless($this->news = $this->getRoute()->getObject());
    }

}
