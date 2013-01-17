<?php

/**
 * dashboard actions.
 *
 * @package    tutorplus
 * @subpackage dashboard
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions {

  public function preExecute() {
    $this->helper = new dashboardGeneratorHelper();
    parent::preExecute();
  }

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request) {
    $this->profile = $this->getUser()->getProfile();
    $this->courses = $this->profile->getCourses();
    $this->discussions = DiscussionTable::getInstance()->findPopularDiscussionsByProfileId($this->profile->getId());
    $this->announcements = AnnouncementTable::getInstance()->findLatest(20);
    $this->newsItems = NewsItemTable::getInstance()->findLatest(3);
    $this->peers = PeerTable::getInstance()->findByProfileId($this->getUser()->getId());
  }

}