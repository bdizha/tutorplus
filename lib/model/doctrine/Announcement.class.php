<?php

/**
 * Announcement
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tutorplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Announcement extends BaseAnnouncement
{
    public function postSave($event)
    {
        $replacements = array($this->getSubject());
        $activityTemplate = ActivityTemplateTable::getInstance()->findOneByType(ActivityTemplateTable::TYPE_POSTED_ANNOUNCEMENT);

        if ($activityTemplate)
        {
            $activityFeed = new ActivityFeed();
            $activityFeed->setActivityTemplate($activityTemplate);
            $activityFeed->setReplacements(json_encode($replacements));
            $activityFeed->save();
        }
    }

    public function getHtmlizedMessage() {
        return myToolkit::htmlString($this->getMessage());
    }

    public function getToEmails() {
        $toEmails = "";
        foreach (sfGuardUserTable::getInstance()->findAll() as $user) {
            $toEmails .= $user->getName() . " <" . $user->getEmail() . ">,";
        }
        
        $toEmails = trim($toEmails, ",");
        return $toEmails;
    }


}
