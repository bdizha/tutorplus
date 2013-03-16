<?php

/**
 * tpCommon actions.
 *
 * @package    tutorplus
 * @subpackage tpCommon
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpCommonComponents extends sfComponents {

  public function executePublicMenu(sfWebRequest $request) {
    $menu = sfYaml::load(dirname(__FILE__) . "/../config/menu.yml");
    $this->menu = $menu["public"];
  }

  public function executeSecureMenu(sfWebRequest $request) {
    $menu = sfYaml::load(dirname(__FILE__) . "/../config/menu.yml");
    $this->menu = $menu["secure"];
  }

  public function executeHeader(sfWebRequest $request) {
//    $this->totalInboxCount = EmailMessageTable::getInstance()->countInboxByEmail($this->getUser()->getEmail());
//    $this->totalNotificationCount = EmailMessageTable::getInstance()->countDraftsByEmail($this->getUser()->getEmail());
  }

}