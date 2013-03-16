<?php

require_once dirname(__FILE__) . '/../lib/tpAnnouncementGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpAnnouncementGeneratorHelper.class.php';

/**
 * tpAnnouncement actions.
 *
 * @package    tutorplus.org
 * @subpackage tpAnnouncement
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpAnnouncementActions extends autoTpAnnouncementActions
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

//    public function processEmails($object)
//    {
//                $toEmails = $object->getToEmails();
//                $announcer = $object->getProfile();
//                $mailer = new tpMailer();
//                $mailer->setTemplate('new-announcement');
//                $mailer->setToEmails($toEmails);
//                $mailer->addValues(array(
//                    "ANNOUNCER" => $announcer->getName(),
//                    "ANNOUNCEMENT_LINK" => $this->getPartial('email_template/link', array(
//                        'title' => $this->generateUrl('announcement_show', array("slug" => $object->getSlug()), 'absolute=true'),
//                        'route' => "@announcement_show?slug=" . $object->getSlug())
//                        )));
//        
//                $mailer->send();
//    }

}
