<?php

require_once dirname(__FILE__) . '/../lib/activity_feedGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/activity_feedGeneratorHelper.class.php';

/**
 * activity_feed actions.
 *
 * @package    tutorplus
 * @subpackage activity_feed
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_feedActions extends autoActivity_feedActions
{

    public function executeIndex(sfWebRequest $request)
    {
        $this->activityFeeds = ActivityFeedTable::getInstance()->findByUserId($this->getUser()->getId());
    }

}