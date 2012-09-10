<?php

/**
 * News
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ecollegeplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class News extends BaseNews
{

    public function postSave($event)
    {
        $replacements = array($this->getId(), $this->getHeading());
        $activityTemplate = ActivityTemplateTable::getInstance()->findOneByType(ActivityTemplateTable::TYPE_POSTED_NEWS);

        if ($activityTemplate)
        {
            $activityFeed = new ActivityFeed();
            $activityFeed->setActivityTemplate($activityTemplate);
            $activityFeed->setReplacements(json_encode($replacements));
            $activityFeed->save();
        }
    }
}
