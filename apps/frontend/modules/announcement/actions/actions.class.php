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
class announcementActions extends autoAnnouncementActions {
    
    public function executeIndex(sfWebRequest $request){
    	$this->announcements = AnnouncementTable::getInstance()->findAll();
    }
	
    public function sendEmail($object) {
//        $toEmails = $object->getToEmails();
//        $announcer = $object->getProfile();
//        $mailer = new tpMailer();
//        $mailer->setTemplate('new-announcement');
//        $mailer->setToEmails($toEmails);
//        $mailer->addValues(array(
//            "ANNOUNCER" => $announcer->getName(),
//            "ANNOUNCEMENT_LINK" => $this->getPartial('email_template/link', array(
//                'title' => $this->generateUrl('announcement_show', array("slug" => $object->getSlug()), 'absolute=true'),
//                'route' => "@announcement_show?slug=" . $object->getSlug())
//                )));
//
//        $mailer->send();
    }
}
